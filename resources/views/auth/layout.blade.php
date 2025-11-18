<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
     <div class=" grid grid-cols-1 lg:grid-cols-2 ">
            <div >               
                <div class="relative">

                    <div class=" lg:w-full lg:h-screen w-full h-[40%] rounded-br-[18%] bg-cover shadow-2xl bg-[url(https://djn2oq6v2lacp.cloudfront.net/wp-content/uploads/2020/02/Times-Square-new-York-City-wiki-f2.jpg)]" alt="ads company">
                      <div class="bg-colorblacktransparent2 rounded-br-[18%]   w-full h-full flex justify-center  ">
                        <a href="/">
                                   <div class="bg-white w-11 h-11 rounded-full opacity-95 cursor-pointer absolute top-0 left-0 mt-8 ml-8 flex justify-center items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
</svg>

                        </div>
                        </a>
                 
                        <div class="lg:mb-0 lg:mx:mx-0 mx-8 mb-4">
                            <div class="flex gap-2 pt-[45%] ">
                                <img src="{{URL::asset('images/whiteLogo.png')}}" class="lg:h-25 h-16" alt="ADS Company Logo" />
                                    <span class="self-center lg:text-4xl text-3xl font-semibold whitespace-nowrap text-white"> Company</span>
                            </div>       
                            
                             <div class=" text-white mx-auto opacity-100 lg:text-2xl text-lg font-bold tracking-wide z-10">Our platform will <span class="text-colororange">advertise</span> you on a large scale </div>
                        </div>
                       
                      </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="flex flex-wrap gap-6  cursor-pointer absolute top-0 right-0 mt-8 mr-8 ">
                        <div class=" text-lg  hover:underline text-black line-height-8 text-colororange ">
                            <a href="/login" class="flex gap-2"><div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5.5 mt-1  ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
                            </div>
 <div>Login</div></a>
                        </div>
                        <div class="text-lg  hover:underline text-black line-height-8">
                            <a href="/register" class="flex gap-2">
                                
                                <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5.5 mt-1 ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
</svg>
</div>
                               <div>Register</div> </a>
                        </div>
                    </div>
                {{-- <div class="mb-10 flex  justify-center items-center ">
                    <div class="flex gap-4  mb-[3%] mt-[10%]"> <img src="{{URL::asset('images/logo.png')}}" alt="" class="w-20 h-20">
                        <div class="text-3xl mt-[10%] text-black">
                            Company
                        </div>
                
                    </div>
                    
                </div> --}}
                <div class="lg:mt-[20%] md:mt-[10%] mt-[7%]">
                 @yield('content')
                 </div>
            </div>
     </div>

</body>
</html>