<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
      $request->validate([
        'login'=> 'required|string|max:250',
        'email'=> 'required|string|email:rfc,dns|max:250|unique:users,email',
        'password'=>'required|string|confirmed|min:8',
        'phone_number'=>'required|phone:BJ',
      ],
      [
        'phone_number.phone' =>'This :attribute must be a valid number.',
      ]
    );

       $user=User::create([
        'login'=> $request->login,
        'email'=> $request->email,
        'password'=> Hash::make($request->password),
        'phone_number'=> $request->phone_number
      ]);

      event(new Registered($user));
      $credentials= $request->only('email', 'password');
      Auth::attempt(($credentials));
      $request->session()->regenerate();
     
      return redirect()->route('verification.notice');
    
      
    }

    
}
