<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="flex w-full flex-shrink-0">
    <div class="basis-[15%] bg-gray-950 rounded-tr-xl rounded-br-xl ">

    
        @include('panel.components.sidebar')
      </div>
    <div class="basis-[85%] flex flex-col h-screen justify-between  bg-colorgris ">
        @include('panel.components.menu')
        <div class="mb-auto h-screen overflow-scroll">
            @yield('content')
        </div>
        
    </div>
</body>
</html>