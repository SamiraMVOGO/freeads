<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Forgot Password</title>
</head>
<body class="bg-gray-50 bg-opacity-80">
    @extends('auth.layout')

@section('content')
<div>
      <form action="/forgot-password-link" method="POST">
    @csrf
    <div class="w-[65%] mx-auto">
  <div class="text-xl mb-[8%]">Enter the email that you want update the password</div>
    <div class="flex flex-col gap-1 mb-4">
        <div  class="flex gap-1">
             <label for="email" class="text-colorblack">Email</label>
             <span class="text-red-700 text-base">*</span>
        </div>
       <div>
    <input class="border-b border-gray-400 p-2 rounded-lg opacity-50 focus:opacity-100  w-full focus:border-black focus:outline-hidden mb-2" type="email" id="email" name="email" placeholder="Your email goes here" value="{{ old('email')}}" >
   @if ($errors->has('email'))
                                <span class="text-red-700">{{ $errors->first('email') }}</span>
                            @endif
       </div>
       
    </div>
    
    <div class="mt-[7%]">
        <button type="submit" class="bg-colororange text-white rounded-full lg:w-[25%] md:w-[30%] w-[60%] mb-4 cursor-pointer h-auto p-2 text-center font-medium">Submit</button>
    </div>
</form>
</div>
   @endsection  
     @vite('resources/js/app.js')
</body>
</html>