
<div class="p-8">
    <div class="flex justify-between mx-4 my-2">
        <h3 class="object-left-top text-black text-xl m-3 p-2 font-semibold">{{$placeTypek}} à {{ $place->commune->name }}</h3>
    </div>
    <div>
        {{-- Images and videos --}}
        
        <div class="w-full h-fit  border-t-2 pt-2">
            <div class="flex justify-center">
                <div class="aspect-video shadow-xl flex justify-center h-96 max-h-96 bg-gray-300">
                    @if ($is_image_selected)

                        
                        @if ($photos[$photoSelectedIndex]) 
                            <div class="self-center">
                                <img class="object-fill max-h-96" src="{{ $path.$photos[$photoSelectedIndex]->url }}">
                            </div>
                        @else
                            <div class="self-center h-max w-max">
                                <img class="object-fill max-h-96" src="{{ $path.$place->photo_couverture }}">
                            </div>
                        @endif
                        
                    @else
                        
                        @if ($videos[$videoSelectedIndex]) 
                            <div class=" w-full h-full">
                                <iframe class="w-full h-full" src="{{ $path.$videos[$videoSelectedIndex]->url }}" frameborder="0"></iframe>
                            </div>
                        @else
                            <div class="h-max w-max">
                                
                            </div>
                        @endif
                    @endif
                </div> 
            </div>
            
        </div>
        <div class="flex justify-center my-4 font-semibold text-xl text-orange-700">
            <h1>Photos</h1>
        </div>
        <div class="flex justify-center gap-4 w-full ">
            @foreach ($photos as $photo)
                
                <div wire:key='p{{ $loop->index }}' class="flex flex-col items-center justify-evenly m-1">
                    <button type="button" x-on:click="$wire.selectPhoto({{ $loop->index }})" class="flex flex-col  cursor-pointer size-28 items-center justify-center h-28 w-28 rounded-lg bg-gray-50 hover:bg-gray-300 ">
                        @if ($photo != '') 
                                <img class="object-fill max-h-28" src="{{ $path.$photo->url }}">
                        @else
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            </div>
                        @endif

                    </button>

                </div> 

                
            @endforeach
        </div>
        <div class="flex justify-center my-4 font-semibold text-xl border-t-2 text-orange-700">
            <h1>Videos</h1>
        </div>
        <div class="flex justify-center gap-4 w-full border-b-2">
            @foreach ($videos as $video)
                
                <div wire:key='v{{ $loop->index }}' class="flex flex-col items-center justify-evenly m-1">
                    <button type="button" x-on:click="$wire.selectVideo({{ $loop->index }})" class="flex flex-col  cursor-pointer size-28 items-center justify-center h-28 w-28 rounded-lg bg-gray-50 hover:bg-gray-300 ">
                        @if ($video != '') 
                                <video class="object-fill max-h-28" src="{{ $path.$video->url }}">
                        @else
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            </div>
                        @endif

                    </button>

                </div> 

                
            @endforeach
        </div>
    </div>


    <div>
        <div class="flex justify-center my-4 font-semibold text-xl text-orange-700">
            <h1>Infos</h1>
        </div>
        <div class="flex justify-between mt-8">
            <div class="flex mx-2">
                <div class="flex mx-2">
                    <p class="text-xl mx-2">Type de proriétée:</p>
                    <p class="text-xl text-orange-500 font-semibold mx-2">{{$placeTypek}}</p>
                </div>

                    
                <div class="flex mx-2">
                    <p class="text-xl mx-2">Offre:</p>
                    <p class="text-xl text-orange-500 font-semibold mx-2">{{$placeOfferTypek}}</p>
                </div>
                <div class="flex mx-2">
                    <p class="text-xl mx-2">Commune:</p>
                    <p class="text-xl font-semibold text-orange-500 mx-2">{{ $place->commune->name }}</p>
                </div>

                
            </div>
                <div class="flex mx-2 border-2 border-orange-500">
                    @if ($place->is_occupe)
                        <p class="text-xl text-orange-500 font-semibold mx-2">Occupée</p>
                    @else
                        <p class="text-xl text-orange-500 font-semibold mx-2">Libre</p>
                    @endif
                </div>
        </div>

        
        <div class="flex justify-end my-10 mx-20">
            <p class="text-xl font-semibold mx-2">Prix:</p>
            <p class="text-orange-500 text-2xl font-semibold mx-2"> {{ $place->price }}F CFA</p>
            @if ($place->offer_type == 'rent')
                <p class="text-orange-500 text-2xl font-semibold mx-2"> / {{ $placeRentPeriodTypek }}</p>
            @endif
        </div>

        <div class="flex justify-evenly my-4">

            <div class="flex flex-col">
                <img src="{{ asset('icons/eye1-svgrepo-com.svg') }}" class="size-8 mx-auto self-center">
                <div class="m-2 text-center text-black text-base font-">
                    Vues
                </div>
                <div class="m-2 text-center text-orange-500 text-xl font-semibold">
                    {{ $place->views }}
                </div>
            </div>


            <div class="flex flex-col">
                <img src="{{ asset('icons/free-svgrepo-com.svg') }}" class="size-8 mx-auto self-center">
                <div class="m-2 text-center text-black text-base font-">
                    Free View
                </div>
                <div class="m-2 text-center text-orange-500 text-xl font-semibold">
                    {{ $place->isfreeViews() }}
                </div>
            </div>

            <div class="flex flex-col">
                <img src="{{ asset('icons/door-svgrepo-com.svg') }}" class="size-8 mx-auto self-center">
                <div class="m-2 text-center text-black text-base font-">
                    Visites
                </div>
                <div class="m-2 text-center text-orange-500 text-xl font-semibold">
                    {{ $place->visites }}
                </div>
            </div>

        </div>

        <div class="grid-cols-6 gap-4">

        </div>
    </div>
    <div>
        <div class="flex justify-center my-4 font-semibold text-xl text-orange-700  border-t-2">
            <h1>Intérieur</h1>
        </div>
    </div>
    <div>
        <div class="flex justify-center my-4 font-semibold text-xl text-orange-700  border-t-2">
            <h1>Extérieur</h1>
        </div>
    </div>
    <div>
        <div class="flex justify-center my-4 font-semibold text-xl text-orange-700  border-t-2">
            <h1>Commodidées</h1>
        </div>
    </div>

    <div>
        <div class="flex justify-center my-4 font-semibold text-xl text-orange-700  border-t-2">
            <h1>Localisation</h1>
        </div>
    </div>
</div>
