<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Notification</title>
     @vite('resources/css/app.css')
</head>
<body>
 @extends('auth.layout')

@section('content')
    <div class=" mt-5">
   <div class="w-[65%] mx-auto">
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
                     Before proceeding, please check your email for a reset password.
                </div>

        </div>   
        </div>
    </div> 
    </div>   
</div>
@endsection

     @vite('resources/js/app.js')
</body>
</html>