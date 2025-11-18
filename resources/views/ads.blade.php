
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>ads</title>

</head>

<body>
    <!--nav-->
    @include('components.header')
    <!--nav-->
    <div class="h-90">
        <div
            class="  bg-[url(https://djn2oq6v2lacp.cloudfront.net/wp-content/uploads/2020/02/Times-Square-new-York-City-wiki-f2.jpg)] object-bottom w-full h-full  ">
            <!--Texte optionnel-->

            <div class="bg-colorblacktransparent   w-full h-full flex justify-center items-center ">
                <div class=" text-white mx-auto opacity-100 text-2xl font-bold tracking-wide z-10">Our platform will
                    <span class="text-colororange">advertise</span> you on a large scale </div>
            </div>
        </div>

    </div>
    </div>
    <form action="{{ route('ads.search') }}" method="GET">
        <div
            class="bg-white  rounded-lg shadow-sm  max-w-110  mx-auto mt-[-20px]  border-b-1 border-gray-400  flex justify-center items-center ">

            <input type="text" name="search"
                class="w-full border-none   h-10 flex  py-4 px-4 outline-none items-center justify-center"
                placeholder="Enter to search ads">
            {{-- <img src="{{URL::asset('images/loupe.png')}}" alt="" class="h-7 mr-4"> --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 mr-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>

        </div>

    </form>





    @include('components.contents')


    @vite('resources/js/app.js')
    <!--<img src={{ asset('images/flyer.png') }} alt="">-->
    <!--foot-->
    @include('components.footer')
    <!--foot-->
</body>

</html>
