<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creation of Category</title>
    @vite('resources/css/app.css')
</head>

<body>
    @extends('panel.layout')

    @section('content')
    <div class=" flex justify-center mt-[7%] ">
        <form class="w-full max-w-4xl" action="{{route('UpdateCategory',$category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="text-xl mb-8">Update a category</div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titleCateg">
                        Name
                    </label>

                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="titleCateg" name= "titleCateg" type="text" placeholder="Title of the ad" value="{{old('title', $category->title) }}"/>
                        @if ($errors->has('titleCateg'))
                            <span class="text-red-700 ">{{ $errors->first('titleCateg') }}</span>
                        @endif
                    
                </div>

            </div>

            <div><button type="submit"
                    class="bg-black hover:shadow-2xl text-white rounded lg:w-[20%] md:w-[30%] w-[60%] mb-4 cursor-pointer h-auto p-3 text-center font-medium">
                    Submit</button></div>

        </form>
    </div>
    @endsection
</body>

</html>