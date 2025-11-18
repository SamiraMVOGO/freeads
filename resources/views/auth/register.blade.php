<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Sign up Ads Company</title>
</head>
<body class="bg-gray-50 bg-opacity-80">

@extends('auth.layout')

@section('content')

    <form action="/register" method="POST">
    @csrf
  
    <div class="w-[65%] mx-auto">

<div class="text-xl mb-[8%]">Signup to have the ability to add an <span class="text-colororange">unlimited</span> number of ads</div>
        <div class="flex flex-col gap-1 mb-4">
            <div class="flex gap-1">
                <label for="login" class="text-colorblack">Name</label>
                <span class="text-red-700 text-base">*</span>
            </div>
            <div>
                <input class="border-b border-gray-400 p-2 rounded-lg opacity-50 focus:opacity-100  w-full focus:border-black focus:outline-hidden mb-2" type="text" id="login" placeholder="Enter your name" name="login" value="{{ old('login')}}" autofocus>
                @if ($errors->has('login'))
                                <span class="text-red-700 ">{{ $errors->first('login') }}</span>
                            @endif
            </div>
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <div  class="flex gap-1">
                <label for="email" class="text-colorblack">Email</label>
                <span class="text-red-700 text-base">*</span>
            </div>
        <div>
    <input class="border-b border-gray-400 p-2 rounded-lg opacity-50 focus:opacity-100  w-full focus:border-black focus:outline-hidden mb-2" type="email" id="email" name="email" placeholder="Your email goes here" value="{{ old('email')}}" >
      @if ($errors->has('email'))
                                <span class="text-red-700 ">{{ $errors->first('email') }}</span>
                            @endif
        </div>
        
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <div  class="flex gap-1">
                <label for="phone" class="text-colorblack">Phone Number</label>
                <span class="text-red-700 text-base">*</span>
            </div>
        <div>
            <input class="border-b border-gray-400 p-2 rounded-lg opacity-50 focus:opacity-100 w-full focus:border-black focus:outline-hidden mb-2" type="phone" id="phone" name="phone_number" value="{{ old('phone')}}" autofocus>
             @if ($errors->has('phone_number'))
                                <span class="text-red-700 ">{{ $errors->first('phone_number') }}</span>
                            @endif
        </div>
            
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <div  class="flex gap-1">
                <label for="password" class="text-colorblack">Password</label>
                <span class="text-red-700 text-base">*</span>
            </div>
            <div>
                  <div class="relative">
                <input class="border-b border-gray-400 p-2 rounded-lg opacity-50 focus:opacity-100  w-full sm:w-full focus:border-black focus:outline-hidden mb-2" type="password" id="password" name="password" value="{{ old('password')}}" >
            <button type="button" id="togglePassword"
                                    class="focus:outline-none absolute top-0 right-0 mt-3 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye cursor-pointer mb-2 ml-10" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                    </svg>
                                </button>
               
            </div>
                 @if ($errors->has('password'))
                                <span class="text-red-700 ">{{ $errors->first('password') }}</span>
                            @endif
            </div>
          
        
            
        </div>
        <div class="flex flex-col gap-1 mb-4">
            <div  class="flex gap-1">
                <label for="password_confirmation" class="text-colorblack">Password Confirmation</label>
                <span class="text-red-700 text-base">*</span>
            </div>
        <div class="relative">
            <input class="border-b border-gray-400 p-2 rounded-lg opacity-50 focus:opacity-100  w-full focus:border-black focus:outline-hidden mb-2" type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation')}}" autofocus>
    
                                <button type="button" id="togglePassword2"
                                    class="focus:outline-none absolute top-0 right-0 mt-3 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye cursor-pointer mb-2 ml-10" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                    </svg>
                                </button>  
        </div>
            
        </div>
        
        <div class="mt-[7%]">
            <button type="submit" class="bg-colororange hover:shadow-2xl text-white rounded-full lg:w-[25%] md:w-[30%] w-[60%] mb-4 cursor-pointer h-auto p-3 text-center font-medium">Sign Up</button>
        </div>
        </form>

    <div>

    @vite('resources/js/app.js')
@endsection
</body>
</html>