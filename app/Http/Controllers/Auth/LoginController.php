<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
    public function login(Request $request)
    {
        $this->validator($request);
        
        if(Auth::guard('web')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
        return redirect()->route('users.index');
        }
    
        //Authentication failed...
        return $this->loginFailed();
    
    }
    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('login');
            
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
        'email'    => 'required|email|exists:users|min:5|max:191',
        'password' => 'required|string|min:4|max:255',

    ];
    
    //custom validation error messages.
    $messages = [
        'email.exists' => 'These email do not match our records.',
    ];
    
    $request->validate($rules,$messages);
    }  
}
