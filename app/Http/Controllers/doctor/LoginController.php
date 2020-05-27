<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

   
    public function showLoginForm()
    {
        return view('doctor.login');
    }

    protected function guard()
{
    return Auth::guard('doctor');
}
public function login(Request $request)
{
    $this->validator($request);
  
    // dd(Auth::guard('doctor')->attempt($request->only('email','password'),$request->filled('remember')));
    if(Auth::guard('doctor')->attempt($request->only('email','password'),$request->filled('remember'))){
        //Authentication passed...
        // if(Auth::guard('doctor')->user()->isBanned()){
        //     return redirect()->route('doctor.login')->with('error','YourAccountIsBanned ');
        // }
    return redirect()->route('doctor.index');
    }

    //Authentication failed...
    return $this->loginFailed();

}

public function logout()
{
    Auth::guard('doctor')->logout();
    return redirect()
    ->route('doctor.login');
        
}
private function loginFailed(){
    return redirect()
        ->back()
        ->withInput()
        ->with('error','Login failed, please try again!');
}
private function validator(Request $request)
{
  //validate the form...
   //validation rules.
   $rules = [
    'email'    => 'required|email|exists:doctors|min:5|max:191',
    'password' => 'required|string|min:4|max:255',
];

//custom validation error messages.
$messages = [
    'email.exists' => 'These email do not match our records.',
];

$request->validate($rules,$messages);
}   

  
}
