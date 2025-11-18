<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordLinkController extends Controller
{
         public function notice()
    {
        return view('auth.forgot-password-link-notice');
        
    }
     public function forgotpasswordlink()
    {
        return view('auth.forgot-password-link');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email'=> 'required|string|email',
        ]);
        $status = Password::sendResetLink(
                $request->only('email')
        );

        // return $status===Password::RESET_LINK_SENT 
        // ? back()->with('status', __($status))
        // : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);

        return $status===Password::RESET_LINK_SENT 
        ? redirect()->route('forgot.password.notice')
        : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);

       
    }
    

    
}
