<?php 

namespace App\Http\Controllers\Company;

use App\User;
use App\Company;
use App\Http\Controllers\Controller;
use App\User as UserModel;
use App\Company as CompanyModel;
use App\project as ProjectModel;
use View, Input, Redirect, Session, Validator;

class AuthController extends Controller {
	
	public function login() {
		
		$param['pageNo'] = 98;
		if ($alert = Session::get('alert')) {
			$param['alert'] = $alert;
		}
		$param['users'] = CompanyModel::get();
		
		return View::make('company.auth.login')->with($param);
	}
	
	public function signup() {
	
		$param['pageNo'] = 99;
		if ($alert = Session::get('alert')) {
			$param['alert'] = $alert;
		}
		
		return View::make('company.auth.signup')->with($param);
	}
	
	public function doSignup() {
	
		$rules = ['name'   => 'required',
		'email'      => 'required|email|unique:company',
		'password'   => 'required|confirmed',
		'password_confirmation' => 'required',
		];
		$validator = Validator::make(Input::all(), $rules);
		
		if ($validator->fails()) {
			return Redirect::back()
			->withErrors($validator)
			->withInput();
		} else {
			$user = new Company;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = md5(Input::get('password'));
			$user->save();
		
			$alert['msg'] = 'User has been signed up successfully';
			$alert['type'] = 'success';
				
			return Redirect::route('company.signup')->with('alert', $alert);
		}
	
	}
	
	public function doLogin() {
	
		$email = Input::get('email');
		$password = Input::get('password');
		$user = CompanyModel::where('email', $email)
						->where('password', md5($password))
						->get();
			
		if (count($user) > 0) {
			Session::set('company_id', $user[0]->id);
	
			return Redirect::route('project');
		} else {
			$alert['msg']='Email & Password is incorrect';
			$alert['type']='danger';
	
			return Redirect::route('company.login')->with('alert', $alert);
		}
	}
	
	public function doLogout() {
		Session::forget('user_id');
		return Redirect::route('company.login');
	}
}
