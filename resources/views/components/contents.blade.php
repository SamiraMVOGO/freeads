<section class="py-10 mt-10">
    <!--<h2 class="font-manrope font-bold text-4xl text-black mb-8 max-lg:text-center">
            Ads list
        </h2>-->
    {{-- <a href="#" class="bg-colororange text-[25px] p-3 flex self-center w-50 m-auto mb-5 justify-center rounded-lg font-medium uppercase">Post Ads</a>
         --}}
    <div class="mx-auto  lg:flex   px-4 sm:px-6 lg:px-8 lg:m-auto lg:justify-between lg:gap-10">
        <div class="  lg:block  basis-[25%] ">

            <form action="" method="GET" class="grid gap:5 lg:gap-10  mb-5">
                <button type="submit" class="font-medium">FILTER BY</button>
                <div class="grid gap-2">
                    <p class="border-b-1  border-gray-200 mb-2"> Category</p>
                    <ul class="w-full rounded-4xl border-1 border-gray-200 p-3">

                        @isset($categorys)

                            <select name="category" id="" class="w-full">
                                <a href="?category=">
                                    <option selected value="">All</option>
                                </a>
                                @foreach ($categorys as $line)
                                    <option value="{{ $line['title'] }}">{{ $line['title'] }}</option>
                                @endforeach
                            </select>
                        @endisset

                    </ul>
                </div>
                <div class="grid gap-2">
                    <p class="border-b-1 border-gray-200 mb-2">Location</p>
                    <ul class="w-full rounded-4xl border-1 border-gray-200 p-3">
                        @isset($locations)

                            <select name="location" id="" class="w-full">
                                <a href="?location=">
                                    <option selected value="">All</option>
                                </a>
                                @foreach ($locations as $line)
                                    <option value="{{ $line['location'] }}">{{ $line['location'] }}</option>
                                @endforeach
                            </select>
                        @endisset

                    </ul>
                </div>
                <div class="grid gap-2">
                    <p class="border-b-1  border-gray-200 mb-2">Price range</p>
                    <div class="flex place-content-start gap-6 outline-none max-h-10 min-h-13 p-2">

                        @isset($price_min)
                            {{-- <a href="?min_price={{$price_min}}"> --}}
                            <input type="number" class="border-[#cc9900] border-1 rounded-4xl lg:w-[30%] p-2"
                                value="{{ $price_min }}" name="prixMin">
                            {{-- </a> --}}
                        @endisset
                        @isset($price_max)
                            {{-- <a href="?max_price={{$price_max}}"> --}}
                            <input type="number" class="border-[#cc9900] border-1 rounded-4xl lg:w-[30%] p-2"
                                value="{{ $price_max }}" name="prixMax">
                            {{-- </a> --}}
                        @endisset
                    </div>

                </div>
                <div class="grid gap-3">
                    <p class="border-b-1 p-2 border-gray-200">Condition</p>
                    <div class="flex flex-wrap  place-content-start gap-6">
                        <ul class="w-full rounded-4xl border-1 border-gray-200 p-3">
                            <select name="condition" id="" class="w-full">
                                <a href="?condition=">
                                    <option selected value="">All</option>
                                </a>

                                <option value="New">New</option>
                                <option value="Good">Good</option>
                                <option value="Used">Used</option>

                            </select>
                        </ul>
                        {{-- <a href="?condition=New"
                            class="border-1  border-black rounded-4xl  flex gap-1 w-25 h-10 items-center justify-center  ">
                            New
                            <div class="bg-blue-500 w-5 h-5 "> </div>
                        </a>
                        <a href="?condition=Good"
                            class="border-1  border-black rounded-4xl  flex gap-1 w-25 h-10 items-center justify-center  ">
                            Good
                            <div class="bg-[#cc9900] w-5 h-5 "> </div>
                        </a>
                        <a href="?condition=Used"
                            class="border-1  border-black rounded-4xl  flex gap-1 w-25 h-10 items-center justify-center  ">
                            Used
                            <div class="bg-black w-5 h-5 "> </div>
                        </a> --}}
                    </div>

                </div>



            </form>
        </div>
        <div class="basis-[75%]">

            {{ $ads->appends(Request::all())->links() }}
            <div class=" grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10  mt-2">

                @isset($ads)

                    @if ($ads->count() != 0)
                    
                        @foreach ($ads as $line)
                        
                    <?php
                        //if(!is_null($line) && !is_null($line['price']) && !is_null($line['title']) && !is_null($line['location']) && !is_null($line['description'])){?>
                        
                            <div
                                class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">
                                <a href="?action=details&id=<?= $line['id'] ?>">
                                    <div class="">

                                        <img src="{{ asset('storage/' . $line['slug']) }}" alt="face cream image"
                                            class="w-full aspect-5/4 rounded-2xl object-cover transition-transform duration-300 transform group-hover:scale-108 peer">

                                    </div>
                                </a>
                                <div class="mt-5">

                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h6
                                                class="font-semibold text-xl leading-8 text-black transition-all duration-500 group-hover:text-[#cc9900]">
                                                @php
                                                    $title = substr($line['title'], 0, 9);
                                                    if (strlen($line['title']) > 10) {
                                                        $title = $title . '...';
                                                    }
                                                @endphp
                                                {{ $title }}

                                            </h6>
                                            <div class="flex gap-1">


                                                <p class="mt-2 font-normal text-lg leading-6 text-gray-500">
                                                    @if ($line->category != null)
                                                        {{ $line->category->title }}
                                                    @else
                                                        Other
                                                    @endif


                                                </p>
                                                <p class="mt-2 font-normal text-lg leading-6 text-gray-500">
                                                    {{ $line['condition'] }}
                                                </p>
                                            </div>


                                            <div class="flex items-center">
                                                <img src="{{ URL::asset('images/localisation.png') }}" alt=""
                                                    class="h-5">
                                                <p class="mt-2 font-normal text-sm leading-6 text-gray-500">
                                                    @php
                                                        $location = substr($line['location'], 0, 9);
                                                        if (strlen($line['location']) > 10) {
                                                            $location = $location . '...';
                                                        }
                                                    @endphp
                                                    {{ $location }}
                                                </p>

                                            </div>


                                        </div>

                                        <div>
                                            <h6
                                                class="font-semibold text-xl leading-8 text-[#cc9900] mb-2 flex justify-end">
                                                {{ $line['price'] }} $
                                            </h6>
                                            <p class="mt-2  text-sm leading-6 text-black font-medium flex justify-end  ">
                                               
                                                <?php
                                                    if (!is_null($line->user->login )) {
                                                        echo "By ".$line->user->login;
                                                    }else{
                                                        echo "Unknown";
                                                    }
                                                ?>
                                                 
                                            </p>
                                            <h6 class="font-medium text-lg leading-8 text-gray-500 flex justify-end">
                                                @php
                                                    $desc = substr($line['description'], 0, 9);
                                                    if (strlen($line['description']) > 10) {
                                                        $desc = $desc . '...';
                                                    }
                                                @endphp
                                                {{ $desc }}
                                            </h6>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <?php// } ?>
                        @endforeach
                    @else
                        <div class="flex justify-center items-center text-3xl "> No Ads found</div>
                    @endif
                @endisset

            </div>
        </div>

    </div>
</section>
<?php
use App\Models\Ads;
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $ad = Ads::findOrFail($id);
}
?>
<div id="myModal" class="modal   <?php if (isset($_GET['action']) && $_GET['action'] == 'details') {
    echo 'block';
} else {
    echo 'hidden';
} ?>">
    @isset($ad)
        <div class="modal-content ">
            <span class="close">&times;</span>
            <div class="flex flex-wrap lg:flex lg:justify-between">

                <div class="lg:w-[50%] w-full">

                    <img src={{ asset('storage/' . $ad->slug) }} alt="Ad Image" class="w-full h-full rounded-md">
                </div>
                <div class="lg:w-[50%] w-full px-14 ">
                    <div class="text-black font-medium text-4xl mb-4 mt-10"> {{ $ad->title }} </div>

                    <div class="text-black font-medium text-2xl mb-4">{{ $ad->price }}$</div>
                    <div class="text-black font-medium  mb-2">
                        @if ($ad->category != null)
                            {{ $ad->category->title }}
                        @else
                            None
                        @endif

                    </div>
                    <div class="text-black font-medium  mb-4 mt-2 flex gap-1"> Condition: {{ $ad->condition }}</div>

                    <div class="text-black font-medium  mb-4"></div>
                    <div>

                        <div class="flex items-center gap-1">
                            <img src="{{ URL::asset('images/localisation.png') }}" alt="" class="h-5">
                            <div class="text-black font-medium  mb-4 mt-2">{{ $ad->location }}</div>
                        </div>

                    </div>
                    <div>
                        <div class="mb-4 mt-2">{{ $ad->description }}</div>
                        <div></div>
                    </div>
                    <div class="text-black font-medium  mb-4 mt-2"> By {{ $ad->user->login }}</div>
                </div>
            </div>
        </div>
    @endisset
</div>
