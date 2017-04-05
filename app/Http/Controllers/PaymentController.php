<?php

namespace App\Http\Controllers;

use App\project;
use App\task;
use View, Input, Redirect, Session, Validator;
use App\Http\Controllers\Controller;
use App\Company as CompanyModel;
use App\Question as QuestionModel;
use App\User as UserModel;
use App\TaskUser as TaskUserModel;
use App\UserProject as UserProjectModel;
use App\PaymentMethod as PaymentMethodModel;
use App\Transaction as TransactionModel;
use App\Answer as AnswerModel;
use App\task as TaskModel;
use App\ExpertiseTask as ExpertiseTaskModel;

use Illuminate\Support\Facades\Config;
use App\Services\BraintreeGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller { 

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('company');
	}


	public function index() {
		$user = \Auth::user();
		$company = $user->company;
		$param['projects'] =$user->company->project()->get();

		$param['pageNo'] = 1;
		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}
		
		return View::make('company.project.index')->with($param);
	}

	public function deposit_project($projectid) {		

		$user = \Auth::user();
		$company = $user->company;
		$gateway = new BraintreeGateway();        
		$payment_method = $user->payment_method()->get()->first();
		$client_method = !is_null($payment_method) && !empty($payment_method->method_id);
		
		return view('client.deposit', compact('gateway', 'client_method', 'projectid'));
	}

	public function deposit_client(Request $request){
			$project = project::find($request->projectid);							
			if(is_null($project)){
				\Session::flash('flash_message','Project does not exist.');				
				return Redirect::to('client/manage');
			}


			$gateway = new BraintreeGateway();
			
			$user = \Auth::user();
			$payment_method = $user->payment_method()->get()->first();
			if(is_null($payment_method)){
				$payment_method = new PaymentMethodModel;
				$payment_method->user_id = $user->id;
				$payment_method->customer_id = '';
				$payment_method->method_id = '';
			}

			echo "-first step-" . $payment_method . "<br/>";
			$error_msg = "";
			if($payment_method->customer_id == ''){
				$customer_params = [];
				$customer_params['name'] = $user->name;
				$customer_params['email'] = $user->email;
				$customer_result = $gateway->createCustomer($customer_params);

				if ($customer_result->success ||!is_null($customer_result->customer)) {
						$customer = $customer_result->customer;
						$payment_method->customer_id = $customer->id;
						$payment_method->save();
				} else {
						foreach($customer_result->errors->deepAll() as $error) {
								$error_msg .= 'Error: ' . $error->code . ": " . $error->message . "\n";
						}
				}        				
			} 
			
			echo "-second step-" . $payment_method . "<br/>";
			if ($payment_method->method_id == ''){
				$method_params = [];
				$method_params['customer_id'] = $payment_method->customer_id;
				$method_params['payment_nonce'] = $request->payment_method_nonce;
				$payment_method_result = $gateway->createPaymentMethod($method_params);


				echo "method-result". $payment_method_result . "<br/>";

				if ($payment_method_result->success || !is_null($payment_method_result->paymentMethod)) {
						$payment_method->method_id = $payment_method_result->paymentMethod->token;
						$payment_method->save();
				} else {
						$errorString = "";
						foreach($payment_method_result->errors->deepAll() as $error) {
								$error_msg .= 'Error: ' . $error->code . ": " . $error->message;
						}
				}
			}
						
			echo "-third step-" . $payment_method . "<br/>";

			$params = [];
			$params['amount'] = 300;
			$params['payment_method_token'] = $payment_method->method_id;
			$result = $gateway->checkoutByPaymentMethod($params);
			
			$transaction = new TransactionModel;
			$is_success = false;
			if ($result->success || !is_null($result->transaction)) {
				$transaction->user_id = $user->id;
				$transaction->transaction_id = $result->transaction->id;
				$transaction->amount = $params['amount'];
				$transaction->payment_type = 'checkout';
				$transaction->project_id = $request->projectid;

				$transaction->save();
				$is_success = true;
				echo "Success " . $transaction->id;
			} else {
					$errorString = "";
					foreach($result->errors->deepAll() as $error) {
							$errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
					}
					echo $errorString;
			}

			if($is_success){
				$project->status = 'open';
				$project->save();
				\Session::flash('flash_message','You create the project successfully.');				
			} else {
				\Session::flash('flash_message','Your deposit is not success and your project is pending now.');				
			}
			return Redirect::to('client/manage');

	}
}
