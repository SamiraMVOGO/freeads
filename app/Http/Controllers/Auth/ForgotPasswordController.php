<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;


class ForgotPasswordController extends Controller
{
   
     public function forgotpassword(string $token)
    {
        return view('auth.forgot-password',['token' => $token]);
    }
   
    public function reset(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email'=> 'required|string|email',
            'password'=>'required|min:8|confirmed',
        ]);
          
         $status = Password::reset(

            $request->only('email', 'password', 'password_confirmation', 'token'),
           
            function (User $user, string $password) {
                dd($user);
                $user->forceFill([
                    'password' => Hash::make($password)

                ])->setRememberToken(Str::random(60));
                $user->save(); 
                dd($user);
                event(new PasswordReset($user));

            }
        );


        return $status == Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
        
    }

}
