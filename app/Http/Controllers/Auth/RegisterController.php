<?php

namespace  App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\skill;
use App\Invitee;
use Flash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	
    public function student()
    {
        $pram = "student";
        return view('auth.form-student',compact('pram'));
    }

    public function company()
    {
        $pram= "company";
        return view('auth.form-company',compact('pram'));
    }

    public function expertise()
    {
        $pram= "expertise";
        return view('auth.form-expertise',compact('pram'));
    }

    public function invite($unique_key = null){
        $skill = skill::all();// to get list of skill
        
        $invitee = Invitee::where('invite_code', $unique_key)->where('isRegistered', 0)->get()->count();

        // user logged in then redirect to home page
        if(\Auth::check() || empty($unique_key) || $invitee == 0){
            return redirect('/');
        }
       
        return view('auth.invite',compact('skill', 'unique_key'));        
    }

    public function register()
    {	
		$skill = skill::all();// to get list of skill
        
        
        // user logged in then redirect to home page
		if(\Auth::check()){
			return redirect('/');
		}
       
        return view('auth.register',compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	// TO VERIFY CONFIRMATION CODE
	
	public function confirm($confirmation_code, Request $request)
    {
        if( ! $confirmation_code)
        {
            //throw new InvalidConfirmationCodeException;
			
			$request->session()->flash('alert-error', 'Wrong Confirmation Code');
			return Redirect('auth/login');
        }
		
        $user = User::whereConfirmationCode($confirmation_code)->first();
		
        if (!$user)
        {
            //throw new InvalidConfirmationCodeException;
			$request->session()->flash('alert-error', 'Something is Wrong Try Again');
			return Redirect('auth/login');
        }

        $user->isActive = 1;
        $user->confirmation_code = null;
        $user->save();
		$request->session()->flash('alert-success', 'You have successfully verified your account.');
       
		return Redirect('auth/login');
    }
}
