<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    /**
     * Handle an authentification attempt
     * 
     * @param \Illuminate\Htpp\Request $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate (Request $request) {
        $credentials = $request->validate([
            'email'=> 'required|email',
           'password'=>'required',
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return $request->user()->hasVerifiedEmail() 
        //     ? redirect()->route('dashboard') : view('auth.verify-email');
        // }


        // if (Auth::attempt($credentials, $request->filled('remember'))){
        //     $request->session()->regenerate();

        //     return $request->user()->hasVerifiedEmail() 
        //     ? redirect()->route('dashboard') : view('auth.verify-email');
        // }

          if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return  $request->user()->hasVerifiedEmail() ? redirect()->intended(('dashboard')) : view('auth.verify-email') ;
        }


        if (Auth::attempt($credentials, $request->filled('remember'))){
            $request->session()->regenerate();

             return  $request->user()->hasVerifiedEmail() ? redirect()->intended(('dashboard')) : view('auth.verify-email') ;
        }

        return back()->withErrors(
            [
                'email'=> 'The provided credentials do not match our records.',
            ]
        )->onlyInput('email');
    }
}
?>