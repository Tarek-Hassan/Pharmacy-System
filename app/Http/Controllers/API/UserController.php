<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class UserController extends Controller
{

    use VerifiesEmails;
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
    public function store(UserRequest $request){
    //   dd($request);
        $request['password']=Hash::make($request->password);
        $request['password_confirmation']=Hash::make($request->password_confirmation);
        $user = User::create($request->all());
        //added to test verification
        $user->sendApiEmailVerificationNotification();
        $success["message"] = "Please confirm yourself by clicking on verify user button sent to you on your email";
        
        // return response()->json($user, 201);//201 objected created
        return response()->json(["success"=>$success], 201);//201 objected created

    }



    //put function
    public function update(Request $request,$user)
    {
        $request['password']=Hash::make($request->password);
        $request['password_confirmation']=Hash::make($request->password_confirmation);
        
        User::find($user)->update($request->all());

        return response()->json($user, 200);
    }

    //delete incase we needed it 
    public function destroy($user){
        User::find($user)->delete();

        return response()->json(null, 204);//204 action executed successfully but no content to return
    }
}
