<a  href="{{ route('showroom.show', ['place_id' => $place->id]) }}" class=" w-full h-full  rounded-xl flex flex-col justify-center items-center border-gray-700 text-center">
    <div class="rounded-xl text-white gradient aspect-video cursor-pointer hover:shadow-xl transition-all duration-200 ease-in">
        <img class=" aspect-video object-fill rounded-t-xl" src="{{ $path }}">
    </div>
    <div class="text-center bg-white shadow-sm w-[60%] rounded-xl border-gray-200 border -mt-8 z-10 p-2 flex items-center flex-col cursor-pointer hover:shadow-xl hover:scale-110 transition-all duration-200 ease-in">
        <h2 class="font-semibold  text-black text-xl line-clamp-1">{{ $place->price }} F CFA</h2>
        <p class="w-full text-black line-clamp-1">{{ $offer_t }}
            @if ($place->offer_type == 'rent')
                / {{ $rent_t }}
            @endif
        </p>
        <p class="w-full text-orange-600 text-sm line-clamp-1 ">{{ $place->commune->name }}</p>
    </div>
</a>
