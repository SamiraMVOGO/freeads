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
        <div class="flex items-center justify-center mb-8">
            <div class="flex mx-[7%]   w-full  rounded-md">

                <div class=" overflow-x-auto bg-[#f7f7f7] rounded-lg mt-[5%]">
                    <div class="flex justify-start font-bold mb-4 text-2xl">
                        <h1>My Profile</h1>
                    </div>

                    <div class="flex justify-end space-x-2 mb-7 ">
                        <div>
                            <a href="{{ route('profile.edit') }}">
                                <button type="submit"
                                    class="cursor-pointer flex justify-center items-center bg-yellow-600 text-white p-2 rounded">Modify
                                    Profile</button>
                            </a>
                        </div>
                        <a href="?action=delete">

                            <button type="submit"
                                class="cursor-pointer flex justify-center items-center bg-yellow-600 text-white p-2 rounded">Delete
                                Account</button>

                        </a>
                    </div>


                    <table class="table-fixed w-full border border-gray-300 rounded-lg mb-4 md:table-fixed">
                        <thead class=" bg-gray-100">
                            <tr class="">
                                <th class="px-4 py-2 text-left">
                                    <span>Username</span>
                                </th>

                            </tr>
                        </thead>
                        <tbody class=" bg-white ">
                            <tr class="border-b border-gray-300 ">
                                <td class="px-4 py-2">
                                    <p>{{ $user->login }}</p>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <table class="table-fixed w-full border border-gray-300 rounded-lg mb-4 md:table-fixed">
                        <thead class=" bg-gray-100">
                            <tr class="">
                                <th class="px-4 py-2 text-left">
                                    <span>Email</span>
                                </th>

                            </tr>
                        </thead>
                        <tbody class=" bg-white ">
                            <tr class="border-b border-gray-300 ">
                                <td class="px-4 py-2">
                                    <p>{{ $user->email }}</p>
                                </td>


                            </tr>
                        </tbody>
                    </table>

                    <table class="table-fixed w-full border border-gray-300 rounded-lg mb-10 md:table-fixed">
                        <thead class=" bg-gray-100">
                            <tr class="">
                                <th class="px-4 py-2 text-left">
                                    <span>Phone Number</span>
                                </th>

                            </tr>
                        </thead>
                        <tbody class=" bg-white ">
                            <tr class="border-b border-gray-300 ">
                                <td class="px-4 py-2">
                                    <p>{{ $user->phone_number }}</p>
                                </td>

                                <td class="px-4 py-2 flex justify-end">
                                    <div class="flex justify-center space-x-2">

                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>


                </div>
            @endsection
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>


<div id="myModalDelete" class="modalDelete <?php if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    echo 'block';
} else {
    echo 'hidden';
} ?>">

    <div class="modal-contentDelete">
        <span class="closeDelete">&times;</span>
        <section id="users" class="mb-12">
            <div class="text-center pt-8">
                Are you sure you want to delete your account?
            </div>
            <div class="flex justify-center items-center">
                <a href="?action=true">
                        <form action="{{ route('profile.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 mt-3 cursor-pointer rounded-md">Confirm</button>
                        </form>
                </a>

            </div>
        </section>
    </div>

</div>
