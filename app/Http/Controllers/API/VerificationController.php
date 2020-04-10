<?php

namespace App\Http\Controllers\API;

use App\Notifications\GreetingNotification;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    //
    use VerifiesEmails;

        /**
    * Mark the authenticated user’s email address as verified.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function verify(Request $request) {

        $userID = $request->id;
        $user = User::findOrFail($userID);
        $date = date("Y-m-d g:i:s");
        $user->email_verified_at = $date; // to enable the “email_verified_at field of that user be a current time stamp by mimicing the must verify email feature
        $user->save();
        $when = carbon::now()->addSeconds(5);
        User::find(7)->notify((new GreetingNotification)->delay($when));
        return response()->json("Email verified!");
    }

        /**
    * Resend the email verification notification.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json("User already have verified email!", 422);
        }
        $request->user()->sendEmailVerificationNotification();
        return response()->json("The notification has been resubmitted");
       
    }


}
