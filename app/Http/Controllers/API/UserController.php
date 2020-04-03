<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
class UserController extends Controller
{
    //get all users
    public function index(){
        return User::all();
    }

    //create new user
    public function store(Request $request){
        return User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'password_confirmation'=>$request->password_confirmation,
            'national_id'=>$request->national_id,
            'gender'=>$request->gender
        ]);
    }
}
