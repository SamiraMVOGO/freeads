<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creation of Ads</title>
    @vite('resources/css/app.css')
</head>

<body>
    @extends('panel.layout')
     {{-- {{var_dump($userCateg)}} --}}
    @section('content')
        <div class=" flex justify-center mt-[7%] ">
            <form class="w-full max-w-4xl" action="/post/ads-create" method="POST" enctype="multipart/form-data">
              @csrf
              
                <div class="text-xl mb-8">Create a new ad</div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                            Title
                        </label>
                        <input required
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white "
                            id="title" type="text" name="title" value="{{old('title')}}"  placeholder="Title of the ad">
                        @error('title')
                            <p class="text-red-500">Between 3 and max 25 valids chars</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="location">
                            Location
                        </label>
                        <input required
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="location" name="location" value="{{old('location')}}"  type="text" placeholder="Location of the ad">
                        @error('location')
                            <p class="text-red-500">Between 3 and max 25 valids chars</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                            Description
                        </label>
                        <input required
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="description" type="text" name="description" value="{{old('description')}}"  placeholder="Description of the add">
                        @error('description')
                            <p class="text-red-500">Between 10 and max 80 valids chars</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                            Price
                        </label>
                        <input required
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="price" name="price" type="number" p value="{{old('number')}}" laceholder="Price of the ad">
                        @error('price')
                            <p class="text-red-500">Invalid price</p>
                        @enderror

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                            Category
                        </label>
                        <div class="relative">
                            <select name="category_id" required
                                class="block appearance-none w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="category">
                                {{-- <option value="0" selected>Select Category</option> --}}
                                @foreach ($userCateg as $item => $key)
                                    <option value="{{ $key['id'] }}">{{ $key['title'] }}</option>
                                @endforeach

                            </select>
                            
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="photo">
                            Photo
                        </label>
                        <input required  
                            class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="photo" type="file" name="slug" placeholder="Photo of the ad">
                        @error('slug')
                            <p class="text-red-500">Required image of max 2MB</p>
                        @enderror

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                           Condition
                        </label>
                        <div class="relative">
                            <select name="condition" required
                                class="block appearance-none w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="category">
                                <option value="Good" selected>Select Condition</option>
            
                                    <option value="New">New</option>
                                     <option value="Good">Good</option>
                                     <option value="Used">Used</option>
                            

                            </select>
                            
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div><button type="submit"
                        class="bg-black hover:shadow-2xl text-white rounded lg:w-[20%] md:w-[30%] w-[60%] mb-4 cursor-pointer h-auto p-3 text-center font-medium">Add
                        a ads</button></div>

            </form>
        </div>
    @endsection
    
   
</body>

</html>
