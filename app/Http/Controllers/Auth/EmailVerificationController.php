<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify-email');
    }

    /**
     * Display an email veriication notice
     * @return \Illuminate\Http\Response
     */

      public function notice(Request $request)
    {
        return $request->user()->hasVerifiedEmail() 
            ? redirect()->route('dashboard') : view('auth.verify-email');
    }

    
    /**
     * User's email verification
     * 
     * @param \Illuminate\Http\EmailVerificationRequest
     * @return \Illuminate\Http\Response
     */
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();

        return redirect()->to('login');
    }

     /**
     * Resend verification email to user
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

     public function resend(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()
        ->withSuccess('A fresh verification link has been sent to your email address.');
     }
}
