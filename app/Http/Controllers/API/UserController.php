<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    use VerifiesEmails;
    //get all users
    public function index(){
        return User::all();
    }

    //get one user
    public function show($user){
        if ($user != auth()->user()->id){
            return "you re not autherized";
       }
        return new UserResource(User::find($user));
    }

    //create new user
    public function store(UserRequest $request){
        
       //hash password
        $request['password']=Hash::make($request->password);
        $request['password_confirmation']=Hash::make($request->password_confirmation);

        
        // storing image in public/pics and changes its name
        if ($request->hasfile('profile_pic')){
            $file=$request->file('profile_pic');
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('prescription/',$filename);
        }
        $request->profile_pic=$filename;
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'password_confirmation'=>$request->password_confirmation,
            'profile_pic'=>$request->profile_pic,
            'national_id'=>$request->national_id,
            'gender'=>$request->gender,
            'mobile'=>$request->mobile,
            'is_admin'=>$request->is_admin,
            'birth_date'=>$request->birth_date

        ]);
        
        
        // $user= User::create($request->all());
        // verification
        $user->sendApiEmailVerificationNotification();
        $success["message"] = "Please confirm yourself by clicking on verify user button sent to you on your email";
        return response()->json(["success"=>$success], 201);//201 objected created
    }



    //put function
    public function update(Request $request,$user)
    {
       //check if autherized user and updates only his data
        if ($user != auth()->user()->id){
            return "you re not autherized";
       }
        $request['password']=Hash::make($request->password);
        $request['password_confirmation']=Hash::make($request->password_confirmation);
        if ($request->hasfile('profile_pic')){
            $file=$request->file('profile_pic');
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('prescription/',$filename);
            $request->profile_pic=$filename;
        }
        
        User::find($user)->update($request->all());

        return response()->json($user, 200);
    }

    //delete incase we needed it 
    public function destroy(Request $request, $user){
        
        $user=User::find($user);


        $user->delete();

        return response()->json("user deleted", 204);//204 action executed successfully but no content to return
    }


   
}
