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
            <form class="w-full max-w-4xl" action="/post/category-create" method="POST">
                @csrf
                @error('titleCateg')
                    <p class="text-red-500">Incorrecte title</p>
                @enderror
                <div class="text-xl mb-8">Create a new category</div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                            Name
                        </label>
                        <input required
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="title" name="titleCateg" type="text" placeholder="Title of the category">
                    </div>
                    
                </div>
               
                <div><button type="submit"
                        class="bg-black hover:shadow-2xl text-white rounded lg:w-[20%] md:w-[30%] w-[60%] mb-4 cursor-pointer h-auto p-3 text-center font-medium">Add
                        a category</button></div>

            </form>
        </div>
    @endsection
</body>

</html>
