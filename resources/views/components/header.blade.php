<header class="border-b-1 border-gray-300  px-4 sm:px-6 lg:px-8">
    @if (Route::has('login'))
        <nav class="w-full flex gap-min-5 md:gap-10 items-center justify-between p-2 ">
            @auth
                <div class="flex">
                    <img src="{{ URL::asset('images/logo.png') }}" class="h-14" alt="logo">
                    <div class="text-2xl mt-[7.2%] text-black">
                        Company
                    </div>
                </div>
                  <ul class="flex justify-center gap-5 text-center font-medium ">
                    <li class="hidden md:flex"><a href="{{ url('/dashboard') }}">PLACE A FREE AD</a></li>
                   
                </ul>
            @else
                <div class="flex">
                    <img src="{{ URL::asset('images/logo.png') }}" class="h-14" alt="logo">
                    <div class="text-2xl mt-[7.2%] text-black">
                        Company
                    </div>
                </div>

                <ul class="flex justify-center gap-5 text-center font-medium ">
                    <li class="hidden md:flex"><a href="login">PLACE A FREE AD</a></li>
                    <li><a href="login" class="md:hidden">POST</a></li>
                    <li><a href="login">LOGIN</a></li>
                    <li><a href="register">REGISTER</a></li>
                </ul>
            @endauth
        </nav>
    @endif
</header>
