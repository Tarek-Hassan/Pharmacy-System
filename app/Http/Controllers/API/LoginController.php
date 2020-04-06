<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            $user = auth()->user();
            // dd($user->tokens());
            if ($user->tokens(['tokenable_id'])){
                // dd(Auth::$user->tokens()->token);
                return response()->json([
                    'user_info'=>$user,
                    'access_token'=>$user->tokens(['tokenable_id'])
                ]);
            }else{
                $user->createTokens($request->email)->plainTextToken;
            // $user->api_token = $user->createToken($request->email)->plainTextToken;
            $user->save();
            return response()->json([
                'user_info'=>$user,
                'access_token'=>$user->createTokens($request->email)->plainTextToken
            ]);
            }
        }
        
        return response()->json([
            'error' => 'Unauthenticated user',
            'code' => 401,
        ], 401);
    }
}
