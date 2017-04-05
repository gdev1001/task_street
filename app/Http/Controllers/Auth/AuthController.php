<?php namespace App\Http\Controllers\Auth;

use App\Company;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\User;
use App\skill;
use App\SkillUser;
use App\Invitee;
use DB;
use App\Student;
use App\Expertise;
use Illuminate\Support\Facades\Redirect;
use App\task;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

    protected $redirectPath = '/profile';
	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
		$this->middleware('guest', ['except' => 'getLogout']);
	}
	
	

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	
	/*
	public function checked() {
		
		if (User::where('email', '=', Input::get('email'))->exists()) {
			return ['result'=>'email already taken'];
		}
		return ['result'=>'email is available'];

	}
	*/
	public function validator(array $data)
	{
	

		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			
		]);
	}
		
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		//Request::merge(['New Key' => 'New Value']);
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			
		]);
	}
	
	protected function getCredentials(Request $request)
    {
        $crendentials=$request->only($this->loginUsername(), 'password');
		//$crendentials['isActive']=1;
		return $crendentials;
    }
	// to user login
	public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);
	
        $throttles = $this->isUsingThrottlesLoginsTrait();
		
        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);
		//to check user activate or not
		if (Auth::validate($credentials)) {
			$user = Auth::getLastAttempted();
			if($user->isActive==0){

				
				$request->session()->put('resend_email', $user->email);
					
				$request->session()->flash('alert-email-verify', 'Your account is not activated Yet,');
			/*$info = [
				'email' => $auth->email,
				'name' => $auth->name,
				'subject' => 'Verify your email address',
			];


			Mail::send('mail_template.verifyEmail', $data, function ($message) use ($info) {
				$message->to($info['email'], $info['name'])
				->subject($info['subject']);
			});*/
				return Redirect('auth/login');
			}
		}
			
        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
			
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

	//to generate random key
	public static function quickRandom($length = 40)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
	}
	// end
	public function postRegister(Request $request)
	{
				


		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}
		
		$user = $this->registrar->create($request->all());
		//$this->auth->login($this->registrar->create($request->all()));
				
		$id = DB::getPdo()->lastInsertId();

		//to inster skill in skill user table

		$skills = Input::all()["skill"];
		foreach ($skills as $skill) {
            if(is_numeric($skill)){
                $skill = skill::find($skill);
				try{
		            $user->skill()->attach($skill->id);
		        }
				catch(\Exception $e){
				}
            }
            elseif(gettype($skill) =="string"){
                $skill = skill::create(['name'=>$skill]);
                $user->skill()->attach($skill->id);
            }
            else{
                // dd(gettype($skill));
            }
        };	

       
		//$user = \Auth::user();
		if (Input::get('state') == 'company')
		{
			$confirmation_code = $this->quickRandom();// to generate key by calling function
			$user->confirmation_code = $confirmation_code;//to insert email key into db
			$user->isCompany = True;
			$user->save();
			Company::create([
				'user_id' => $id,
			]);
			$data = ['confirmation_code' => $confirmation_code, 'user_type' => "Company"];
			$info = [
			'email' => Input::get('email'),
			'name' => Input::get('name'),
			'subject' => 'Verify your email address',
			];
			
			Mail::send('mail_template.verifyEmail', $data, function ($message) use ($info) {
				$message->to($info['email'], $info['name'])
				->subject($info['subject']);
			});
			
			$request->session()->put('username', Input::get('name'));
			$request->session()->flash('alert-email-activate', 'Please check email to activate your account');
			return Redirect('auth/register/success');// to redirect back success page	

		}
		else if  (Input::get('state') == 'student')
		{
			$confirmation_code = $this->quickRandom();// to generate key by calling function
			$user->confirmation_code = $confirmation_code;//to insert email key into db
			$user->isStudent = True;
		
			$user->save();
			Student::create([
				'user_id' => $id,
			]);
			$data = ['confirmation_code' => $confirmation_code, 'user_type' => "Developer"];
					
			$info = [
			'email' => Input::get('email'),
			'name' => Input::get('name'),
			'subject' => 'Verify your email address',
			
			];
			
			Mail::send('mail_template.verifyEmail', $data, function ($message) use ($info) {
				$message->to($info['email'], $info['name'])
				->subject($info['subject']);
			});
			
			$request->session()->put('username', Input::get('name'));
			$request->session()->flash('alert-email-activate', 'Please check email to activate your account');
												
			return Redirect('auth/register/success');// to redirect back success page			
			//return Redirect('profile');
		}
		else if  (Input::get('state') == 'expertise')
		{
			$unique_key = Input::get('unique_key');
	        $invitee = Invitee::where('invite_code', $unique_key)->first();
	        $invitee->isRegistered = 1;
	        $invitee->save();

			$user->isActive = 1;//active by default
			$user->isExpertise = True;
			$user->save();
			Expertise::create([
				'user_id' => $id,
			]);
			return Redirect('expertise');
		}
	}
	
	// to check unique email using ajax
	public function email_check()
    {
       	$email = Input::get("email");		
 		if (User::where('email', '=', Input::get('email'))->exists()) {
			//return "The email has already been taken";
			return "true";
		}else{
			return "false";
		}
    }
	// show welcome page after successful registration
	public function success()
    {
        return view('auth.register-success');
    }
	
	//to resend email activation code
	public function resend_activation(Request $request)
	{
		$email = $request->session()->get('resend_email');
		
		if(!empty($email))
		{
			$confirmation_code = $this->quickRandom();//to generate verification key 
			$user = User::whereEmail($email)->first();//insert email verification key into db
			$user->confirmation_code = $confirmation_code;
			$user->save();
			
			$data = ['confirmation_code' => $confirmation_code];
						
			$info = [
			'email' => $user->email,
			'name' => $user->name,
			'subject' => 'Verify your email address',
			];
		
			Mail::send('mail_template.resendVerifyEmail', $data, function ($message) use ($info) {
				$message->to($info['email'], $info['name'])
				->subject($info['subject']);
			});
			
			$request->session()->forget('resend_email');
			$request->session()->flash('alert-success', 'Please check email to verify your Email Id');
		}
		else{
			$request->session()->flash('alert-error', 'Something is wrong! Please Try Again');
		}
		
		return Redirect('auth/login');
	}

		
}
