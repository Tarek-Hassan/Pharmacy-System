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

    //get one user
    //how to make it search by email
    public function show($user){
        return new UserResource(User::find($user));
    }

    //create new user
    public function store(Request $request){
        // return User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        //     'password_confirmation'=>$request->password_confirmation,
        //     'national_id'=>$request->national_id,
        //     'gender'=>$request->gender
        // ]);
        $user = User::create($request->all());

        return response()->json($user, 201);//201 objected created
    }

    //delete incase we needed it 
    //it returns 401 unauthenticated but it deletes
    public function destroy($user){
        $user->delete();

        return response()->json(null, 204);//204 action executed successfully but no content to return
    }
}
