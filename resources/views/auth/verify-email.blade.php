<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 bg-opacity-80">
 @extends('auth.layout')

@section('content')
 <div class="w-[65%] mx-auto">
    <div class=" mt-5">
    <div class="">
        <div class=" bg-white shadow-lg  px-8 py-4  rounded-lg w-full">
            <div class="text-center mb-8 font-bold text-lg">Verify Your Email Address</div>
           <div class ="text-center mb-8 font-bold ">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                </div>
                <div class="text-center mb-8 ">
                    Before proceeding, please check your email for a verification link. If you did not receive the email, click on this button below
                </div>
                
                <form class="text-center" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="bg-colororange text-white rounded-full w-auto cursor-pointer h-auto p-2 text-center font-medium mx-auto">click here to request another</button>
                </form>

        </div>
    </div> 
</div>   
</div>
@endsection
</body>
</html>