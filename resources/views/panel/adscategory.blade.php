<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Add Category</title>

</head>

<body>
    @extends('panel.layout')

    @section('content')
    <div class="flex items-center justify-center mb-8">
        <div class="flex mx-[7%] bg-white  w-full  rounded-md">

            <div class=" overflow-x-auto bg-colorgris rounded-lg">
                @if ($message = Session::get('success'))
                <div class="text-green-700 text-center mt-2">
                    {{ $message }}
                </div>
                @endif
                <div class="flex justify-end items-center mt-4 ">
                    <a class="flex justify-center items-center bg-colororange text-white p-2 mt-[5%] rounded"
                        href="/create-category">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        New Category
                    </a>
                </div>
                <div class="flex justify-start font-bold mb-4 text-2xl">
                    <h1>My categories</h1>
                </div>
                <div class="">
                    {{ $userCateg->links() }}
                    <table class="table-fixed w-full border border-gray-300 rounded-lg mt-2">
                        <thead class=" bg-gray-100">
                            <tr class="">
                                <th class="px-4 py-2 text-left">
                                    <span>Id</span>


                                </th>



                                <th class="px-4 py-2 text-left">
                                    <div>
                                        <span>Name</span>


                                    </div>

                                </th>
                                <th class="px-4 py-2 text-center ">Options</th>
                            </tr>
                        </thead>
                        <tbody class=" bg-white  overflow-hidden">

                            {{-- {{var_dump($userCateg);}} --}}
                            @isset($userCateg)


                            @if ($userCateg->count() != 0)


                            @foreach ($userCateg as $item => $key)
                            <tr class="border-b border-gray-300 ">
                                <td class="px-4 py-2">
                                    <?php echo $key['id']; ?>
                                </td>
                                <td class="px-4 py-2">
                                    <?php echo $key['title']; ?>
                                </td>

                                <td class="px-4 py-2 cursor-pointer">
                                    <div class="flex justify-center space-x-2">

                                        <a href="/post/edit/{{$key['id']}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6 text-yellow-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>


                                        <a href="?action=delete&id={{$key['id']}}">
                                            <button type="button" data-target="#myModalDelete">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6 text-red-600 cursor-pointer">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>

                                        </a>
                                    </div>


                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr class="border-1 text-center text-gray-400">
                                <td>Empty</td>
                                <td>Empty</td>


                            </tr>
                            @endif

                            @endisset


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @vite('resources/js/app.js')
    @endsection
</body>
<?php 
if (isset($_GET['id']) ) {
    $id=htmlspecialchars($_GET['id']);
                                                
  } 

?>

<div id="myModalDelete" class="modalDelete <?php if (isset($_GET['action']) && $_GET['action'] == 'delete') {
                                                echo 'block';
                                            } else {
                                                echo 'hidden';
                                            } ?>">
 
    <div class="modal-contentDelete">
        <span class="closeDelete">&times;</span>
        <section id="users" class="mb-12">
            <div class="text-center pt-8">
                Are you sure you want to delete this category?
            </div>
            <div class="flex justify-center items-center">
                <a href="?action=true">
                    @isset($id)
                     <form action="{{ route('category.destroy', $id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 mt-3 cursor-pointer rounded-md">Confirm</button>
                        </form>
                    @endisset
                    <!-- <button class="bg-red-500 text-white p-2 mt-3 cursor-pointer rounded-md"> Confirm</button> -->
                </a>

            </div>
        </section>
    </div>

</div>

</div>

</html>