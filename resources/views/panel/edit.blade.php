<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Profile User</title>

</head>

<body>
    @extends('panel.layout')

    @section('content')

    <div class=" flex justify-center mt-[7%]">

        <form action="{{ route('profile.update') }}" class="w-full max-w-4xl" method="POST">
            @csrf
            @method('PUT')

            <div class="text-xl mb-8">
                Modify my Profile
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2" for="login">
                        Login
                    </label>
                    <input type="text" name="login" value="{{ old('login', $user->login) }}"
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white " />
                     @if ($errors->has('login'))
                            <span class="text-red-700 ">{{ $errors->first('login') }}</span>
                        @endif
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2" for="email">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="email" name="email" value="{{ old('email', $user->email) }}" />
                     @if ($errors->has('email'))
                            <span class="text-red-700 ">{{ $errors->first('email') }}</span>
                        @endif
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2" for="phone_number">
                        Phone Number
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type=" text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" />
                     @if ($errors->has('phone_number'))
                            <span class="text-red-700 ">{{ $errors->first('phone_number') }}</span>
                        @endif
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2" for="password">
                        New Password
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="password" name="password" placeholder="leave blank if unchanged" />
                      @if ($errors->has('password'))
                            <span class="text-red-700 ">{{ $errors->first('password') }}</span>
                        @endif
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2" for="password_confirmation">
                        Confirm Password
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="password" name="password_confirmation" placeholder="leave blank if unchanged" />

                </div>
            </div>

            <div class="">
                <button type="submit" class="bg-black hover:shadow-2xl text-white rounded lg:w-[20%] md:w-[30%] w-[60%] mb-4 cursor-pointer h-auto p-3 text-center font-medium">
                    Update
                </button>
            </div>
        </form>

    </div>
    @endsection
</body>

</html>