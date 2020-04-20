<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\VerifiesEmails;
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
        // return response()->json([
        //     'message'=>"you are not autherized"
        // ]);
        $user=new UserResource(User::find($user));
        return response($user,200,[
            'status'=>true,
            'error'=>""
        ]);
    }

    //create new user
    public function store(UserRequest $request){
        // dd($request->profile_pic);
       //hash password
       $request['profile_pic']=Storage::disk('public')->put('profile_pics',$request->profile);
    //    dd($request->profile_pic);

        $request['password']=Hash::make($request->password);
        $request['password_confirmation']=Hash::make($request->password_confirmation);
        $user=User::create($request->all());
        // verification
        $user->sendApiEmailVerificationNotification();
        $success["message"] = "Please confirm yourself by clicking on verify user button sent to you on your email";
        return response()->json($user, 201);//201 objected created
    }



    //put function
    public function update(UpdateUserRequest $request,$user)
    {
       //check if autherized user and updates only his data
        if ($user != auth()->user()->id){
            return response()->json([
                'message'=>"you are not autherized"
            ]);
       }

       //make sure not to update email
       if($request->email){
            return response()->json([
                'message'=>"you cannot change email"
            ]);
       }

       //if updating password hash it
       if($request->password){
        $request['password']=Hash::make($request->password);
        $request['password_confirmation']=Hash::make($request->password_confirmation);
       }

       //if updating profile pic delete the old image and save the new one
       if($request->profile){
            Storage::disk('public')->delete($request->oldimg);
            $request['profile_pic']=Storage::disk('public')->put('profile_pics',$request->profile);
       }else{
           $request["profile_pic"]=$request->oldimg;
       }

       $user=User::findOrFail($user);
       $user->update($request->all());
       $user->fresh();

        return response()->json($user, 200);
    }

    //delete incase we needed it 
    public function destroy(Request $request, $user){
        
        $user=User::find($user);


        $user->delete();

        return response()->json("user deleted", 204);//204 action executed successfully but no content to return
    }


   
}
