<?php

namespace App\Http\Controllers\Auth;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Pharmacy;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:doctor');
        $this->middleware('guest:pharmacy');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    /**
 * @return Factory|View
 */
public function showDoctorRegisterForm()
{
    return view('auth.register', ['url' => 'doctor']);
}
 
// /**
//  * @param Request $request
//  *
//  * @return RedirectResponse
//  */
protected function createDoctor(Request $request)
{
    $this->validator($request->all())->validate();
    Doctor::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    return redirect()->intended('login/doctor');
}
 
//  /**
//  * @return Factory|View
//  */
public function showPharmacyRegisterForm()
{
    return view('auth.register', ['url' => 'pharmacy']);
}
 
// /**
//  * @param Request $request
//  *
//  * @return RedirectResponse
//  */
protected function createPharmacy(Request $request)
{
    $this->validator($request->all())->validate();
    Pharmacy::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    return redirect()->intended('login/pharmacy');
}
}
