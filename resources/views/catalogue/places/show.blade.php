<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propriétées') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-between mx-4 my-2">
                    <h3 class="object-left-top text-xl m-3 p-2 font-semibold">House type at {{ $place->commune->name }}</h3>
                    <div class="flex w-max justify-end">
                        <a class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  shadow-xl sm:rounded-lg" href="{{ route('catalogue.places.edit', ['house_id' => $place->id]) }}">Modifier</a>
                        <a class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-red-600  shadow-xl sm:rounded-lg" href="{{ route('catalogue.places.delete', ['house_id' => $place->id]) }}">Supprimer</a>
                    </div>
                    
                    <div>
                        {{-- Images and videos --}}
                        
                        {{-- <div class="w-full h-1/2">
                            <div class="w-full flex justify-center h-96 max-h-96 bg-gray-300">
                                @if ($is_image_selected)

                                    
                                    @if ($photos[$photoSelectedIndex]) 
                                        <div class="">
                                            <img class="object-fill max-h-96" src="{{ $photos[$photoSelectedIndex]->temporaryUrl() }}">
                                        </div>
                                    @else
                                        <div class="h-max w-max">
                                        </div>
                                    @endif
                                    
                                @else
                                    
                                    @if ($videos[$videoSelectedIndex]) 
                                        <div class="">
                                            <video class="object-fill max-h-96" src="{{ $videos[$videoSelectedIndex]->temporaryUrl() }}">
                                        </div>
                                    @else
                                        <div class="h-max w-max">
                                            
                                        </div>
                                    @endif
                                @endif
                            </div> 
                        </div>
                        <div class="flex justify-evenly w-full">
                            @foreach ($photos as $photo)
                                
                                <div wire:key='p{{ $loop->index }}' class="flex flex-col items-center justify-evenly m-1">
                                    <button type="button" x-on:click="$wire.selectPhoto({{ $loop->index }})" class="flex flex-col  cursor-pointer size-28 items-center justify-center h-28 w-28 rounded-lg bg-gray-50 hover:bg-gray-300 ">
                                        @if ($photo != '') 
                                                <img class="object-fill max-h-28" src="{{ $photos[$loop->index]->temporaryUrl() }}">
                                        @else
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <p class="mb-2 text-4xl text-black "><span class="font-semibold">+</span></p>
                                            </div>
                                        @endif

                                    </button>

                                    <label for="p{{ $loop->index }}" class="gradient cursor-pointer my-2 rounded-lg px-2 py-1 text-center text-white font-semibold mx-auto text-base">
                                        Nouvelle photo
                                        <input id="p{{ $loop->index }}" type="file" class="hidden" wire:model="photos.{{ $loop->index }}" />
                                    </label>
                                    @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                                </div> 

                                
                            @endforeach
                        </div>
                        
                        <div class="flex justify-evenly w-full">
                            @foreach ($videos as $video)
                                
                                <div wire:key='v{{ $loop->index }}' class="flex flex-col items-center justify-evenly m-1">
                                    <button type="button" x-on:click="$wire.selectVideo({{ $loop->index }})" class="flex flex-col  cursor-pointer size-28 items-center justify-center h-28 w-28 rounded-lg bg-gray-50 hover:bg-gray-300 ">
                                        @if ($video != '') 
                                                <video class="object-fill max-h-28" src="{{ $videos[$loop->index]->temporaryUrl() }}">
                                        @else
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <p class="mb-2 text-4xl text-black "><span class="font-semibold">+</span></p>
                                            </div>
                                        @endif

                                    </button>

                                    <label for="v{{ $loop->index }}" class="gradient cursor-pointer my-2 rounded-lg px-2 py-1 text-center text-white font-semibold mx-auto text-lg">
                                        Nouvelle video
                                        <input id="v{{ $loop->index }}" type="file" class="hidden" wire:model="videos.{{ $loop->index }}" />
                                    </label>
                                    @error('videos.*') <span class="error">{{ $message }}</span> @enderror
                                </div> 

                                
                            @endforeach
                        </div> --}}
                    </div>


                    <div>
                        {{-- Place informations --}}
                    </div>

                    <div>
                        {{-- Location --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>