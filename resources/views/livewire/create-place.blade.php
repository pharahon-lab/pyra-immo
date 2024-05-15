@php
    $placeTypes = App\Enum\PlaceTypeEnum::cases();
    $placeOfferTypes = App\Enum\PlaceOfferTypeEnum::cases();
    $placeRentPeriodTypes = App\Enum\PlaceRentPeriodEnum::cases();
    $commumes = App\Models\Communes::all();
@endphp


<div class="h-max">
    <form wire:submit="save">

        <div class="flex justify-between gradient">
            <div class="px-8 py-4 text-white text-2xl font-semibold capitalize content-center">
                <h3>Nouvelle Propriétée</h3>
            </div>
            {{ $place_type }}
            <div class="flex justify-end px-8 py-4">
                
                <div class="flex-col">
                    <div class="m-2 text-white text-base text-center font-semibold">
                        <label for="place_type">Type de prorpiétée</label>
                    </div>
                    <select class="shadow-md rounded-l-full" id="place_type" name="place_type" wire:model.live="place_type">
                        @foreach ($placeTypes as $placeType)
                            <option value="{{ $placeType->value }}">{{ $placeType->name }}</option>
                            
                        @endforeach
                    </select>
                </div>

                <div class="flex-col">
                    <div class="m-2 text-white text-base text-center font-semibold">
                        <label for="place_offer">Offre</label>
                    </div>
                    <select  class="shadow-md" id="place_offer" wire:model.live="placeForm.offer_type">
                        @foreach ($placeOfferTypes as $placeOffer)
                            <option value="{{ $placeOffer->value }}">{{ $placeOffer->name }}</option>
                            
                        @endforeach
                    </select>
                        
                </div>

                {{-- Commune --}}
                <div class="flex-col">
                    <div class="m-2 text-white text-base text-center font-semibold">
                        <label for="commune"> Commune / Quartier</label>
                    </div>
                    <div>
                        <select class="text-black shadow-md rounded-r-full" name="commune" id="commune" wire:model="placeForm.commune">

                        @foreach ($commumes as $commune)
                            <option value="{{$commune->id}}">
                                <div class="flex justify-left text-black">
                                    <img class="px-2" src="{{ asset('flags/'.$commune->city->country->country_code.'.png') }}" style="height: 1rem">
                                    <span  class="">{{  $commune->name  }} ({{  $commune->city->name  }} {{  $commune->city->country->country_code  }})</span>
                                </div>
                                
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div  class="h-max">

            <div class="flex justify-center my-4 font-semibold text-xl text-orange-700">
                <h1>Photo</h1>
            </div>
            <div class="w-full h-1/2">
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
            </div>

        </div>

        <div class="tab">
            
            <div class="flex justify-evenly m-8">
                <button type="button" class="tablinks p-2 mx-4 rounded-t-xl font-semibold text-xl w-full border-b-4 border-orange-600 hover:bg-orange-200 focus:outline-none bg-orange-300 active" onclick="openTabContent('info')">Infos</button>
                <button type="button" class="tablinks p-2 mx-4 rounded-t-xl font-semibold text-xl w-full border-b-4 border-gray-300 hover:bg-orange-200 focus:outline-none" onclick="openTabContent('interior')">Intérieur</button>
                <button type="button" class="tablinks p-2 mx-4 rounded-t-xl font-semibold text-xl w-full border-b-4 border-gray-300 hover:bg-orange-200 focus:outline-none" onclick="openTabContent('exterior')">Extérieur</button>
                <button type="button" class="tablinks p-2 mx-4 rounded-t-xl font-semibold text-xl w-full border-b-4 border-gray-300 hover:bg-orange-200 focus:outline-none" onclick="openTabContent('comodities')">Comoditées</button>
            </div>
            
            <!-- Tab content -->
            <div id="info" class="tabcontent">
                
                
                <div class="flex justify-evenly">
                    <div class="flex justify-start">
                        <div class="flex-col">
                            <div class="m-2 text-black text-lg font-semibold">
                                <label for="place_type">Prix:</label>
                            </div>
                            <input class="border-b-2 border-t-0  border-x-0 font-semibold text-3xl text-orange-600 border-orange-400 appearance-none " type="text" id="price" name="price" wire:model="placeForm.price">
                        </div>

                        @if ($placeForm->offer_type == 'rent')
                            
                            <div class="mx-8 content-end">
                                <h2 class="text-6xl font-semibold">/</h2>
                            </div>

                            <div class="flex-col">
                                <div class="m-2 text-black text-lg font-semibold">
                                    <label for="rent_period">Durée location:</label>
                                </div>
                                <select class="text-3xl font-semibold" id="rent_period" wire:model="placeForm.rent_period">
                                    @foreach ($placeRentPeriodTypes as $placeRent)
                                        <option value="{{ $placeRent->value }}">{{ $placeRent->name }}</option>
                                        
                                    @endforeach
                                </select>
                                    
                            </div>

                        @endif

                        

                    </div>

                    
                    
                </div>
                <div class="flex justify-center my-4">
                    <div class="flex justify-center w-2/3 flex-col">
                        <div class="flex flex-col content-center m-2">
                            <div class="m-2 text-black text-lg font-semibold">
                                <label for="condition">Conditions:</label>
                            </div>
                            <textarea class="w-full h-50" type="text" id="condition" name="condition" wire:model="placeForm.condition"></textarea>
                        </div>
                    </div>                    
                </div>
                <div class="flex justify-center">
                    <div class="flex justify-center w-2/3 flex-col">
                        <div class="flex flex-col content-center m-2">
                            <div class="m-2 text-black text-lg font-semibold">
                                <label for="description">Description:</label>
                            </div>
                            <textarea class="w-full h-50" type="text" id="description" name="description" wire:model="placeForm.description"></textarea>
                        </div>
                    </div>                  
                </div>

            </div>
            
            <div id="interior" class="tabcontent hidden">
                
                <div class="ms-8">
                    <div class="flex justify-evenly my-4">
        

                        @if(!in_array($place_type, $not_living))
                                
                            <div class="flex justify-start px-8 py-">
                            
                                <div class="flex flex-col m-2">
                                    <img src="{{ asset('icons/door-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="nombre_piece">Pièces</label>
                                    </div>
                                    <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="nombre_piece" name="nombre_piece" wire:model="interiorForm.nombre_piece">
                                </div>
                
                                
                                <div class="flex flex-col m-2">
                                    <img src="{{ asset('icons/shower-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="nombre_salle_eau">Salles d'eau</label>
                                    </div>
                                    <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="nombre_salle_eau" name="nombre_salle_eau" wire:model="interiorForm.nombre_salle_eau">
                                </div>
                
                            </div>
                        @endif

                        @if(in_array($place_type, $not_living))
                            <div class="flex flex-col ms-8">
                                <img src="{{ asset('icons/area-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                <div class="m-2 text-center text-black text-lg font-semibold">
                                    <label for="superficie">Superficie</label>
                                </div>
                                <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="superficie" name="superficie" wire:model="interiorForm.superficie">
                            </div>
                            <div class="flex flex-col">
                                <img src="{{ asset('icons/storehouse-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                <div class="m-2 text-center text-black text-lg font-semibold">
                                    <label for="volume">Volume</label>
                                </div>
                                <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="volume" name="volume" wire:model="interiorForm.volume">
                            </div>
                        @endif
                        
        
                    </div>
                    
                    <div class="flex justify-evenly my-4">
        
                        <div class="flex justify-start px-8 py-">
                        
                            @if(in_array($place_type, $chambrable))
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/elevator-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="etage">Etage</label>
                                    </div>
                                    <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="etage" name="etage" wire:model="interiorForm.etage">
                                </div>
                            @endif
            
                            @if(in_array($place_type, $etage_nb_t))
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/elevator-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="nombre_etage">Nombre d'étages</label>
                                    </div>
                                    <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="nombre_etage" name="nombre_etage" wire:model="interiorForm.nombre_etage">
                                </div>
                            @endif
            
                        </div>
                        
                        @if(in_array($place_type, $etage_nb_t))
                            <div class="flex justify-start px-8 py-">
                                    
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/downstairs-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="basement">Sous sol</label>
                                    </div>
                                    <input class="self-center size-12 border-2" type="checkbox" id="basement" name="basement" wire:model="interiorForm.basement">
                                </div>
                
                                
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/downstairs-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="nombre_etage_basement">Nombre d'étage sous sol</label>
                                    </div>
                                    <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="nombre_etage_basement" name="nombre_etage_basement" wire:model="interiorForm.nombre_etage_basement">
                                </div>
                
                            </div>
                        @endif
        
                    </div>
                    
                    <div class="flex justify-evenly my-4">
    
                        @if(in_array($place_type, $conf))
                            <div class="flex justify-start px-8 py-">
                                
                                            
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/conference-room-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <label class="m-2  text-center text-black text-lg font-semibold" for="salle_de_conf">Salle de conference</label>
                                    <input class="self-center size-12 border-2" type="checkbox" id="salle_de_conf" name="salle_de_conf" wire:model="interiorForm.salle_de_conf">
                                </div>
            
                                
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/conference-room-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="nombre_salle_de_conf">Nombre de salle de conference</label>
                                    </div>
                                    <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="nombre_salle_de_conf" name="nombre_salle_de_conf" wire:model="interiorForm.nombre_salle_de_conf">
                                </div>
                
                            </div>

                            <div class="flex flex-col">
                                <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                <label class="m-2 text-center text-black text-lg font-semibold" for="open_space">Open space</label>
                                <input class="self-center size-12 border-2" type="checkbox" id="open_space" name="open_space" wire:model="interiorForm.open_space">
                            </div>
                        @endif
                        
                        @if(in_array($place_type, $chambrable))
                            <div class="flex flex-col">
                                <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                <div class="m-2 text-center text-black text-lg font-semibold">
                                <label for="numero_de_porte">Numero de porte</label>
                                </div>
                                <input class="border-2 self-center w-1/4 font-semibold text-lg" type="text" id="numero_de_porte" name="numero_de_porte" wire:model="interiorForm.numero_de_porte">
                            </div>
                
                            
                            <div class="flex flex-col">
                                <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                <label class="m-2 text-center text-black text-lg font-semibold" for="place_type">suite</label>
                                <input class="self-center size-12 border-2" type="checkbox" id="suite" name="suite" wire:model="interiorForm.suite">
                            </div>
                        @endif
        
                    </div>
        
        
                </div>

            </div>
            
            <div id="exterior" class="tabcontent hidden">
                
                <div class="ms-8">
            
                    <div class="flex justify-evenly">
                            
                        @if(!in_array($place_type, $not_living))

                            <div class="flex-col w-1/6 text-center">
                                <div class="m-2 text-center text-black text-lg font-semibold">
                                    <h5>piscine</h5>
                                </div>
                                <div class="flex justify-evenly">
                                    <div class="flex flex-col">
                                        <img src="{{ asset('icons/pool-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                        <div class="m-2 text-center text-black text-lg font-semibold">
                                            <label for="piscine">Piscine</label>
                                        </div>
                                        <input class="self-center size-12 border-2" type="checkbox" id="piscine" name="piscine" wire:model="exteriorForm.piscine">
                                    </div>
                                    
                                    
                                    <div class="flex flex-col">
                                        <img src="{{ asset('icons/pool-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                        <div class="m-2 text-center text-black text-lg font-semibold">
                                            <label for="piscine_is_interne">Piscine interne</label>
                                        </div>
                                        
                                        <input class="self-center size-12 border-2" type="checkbox" id="piscine_is_interne" name="piscine_is_interne" wire:model="exteriorForm.piscine_is_interne">
                                    </div>
            
                                </div>
                            </div>

                        @endif
                        
        
                        <div class="flex-col w-1/6 text-center">
                            <div class="m-2 text-center text-black text-lg font-semibold">
                                <h5>Parking/Garage</h5>
                            </div>
                            <div class="flex justify-evenly">
                                
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/parking-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="parking">parking</label>
                                    </div>
                                    <input class="self-center size-12 border-2" type="checkbox" id="parking" name="parking" wire:model="exteriorForm.parking">
                                </div>
                                
                                
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/parking-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="place_parking">Nombre place parking</label>
                                    </div>
                                    <input class="self-center size-12 border-2" type="checkbox" id="place_parking" name="place_parking" wire:model="exteriorForm.place_parking">
                                </div>
            
                            </div>
                        </div>
            
                        
                        <div class="flex-col w-1/6 text-center">
                            <div class="m-2 text-center text-black text-lg font-semibold">
                                <h5>Cours</h5>
                            </div>
                            <div class="flex justify-evenly">
                                
                                
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="cours_avant">cours_avant</label>
                                    </div>
                                    
                                    <input class="self-center size-12 border-2" type="checkbox" id="cours_avant" name="cours_avant" wire:model="exteriorForm.cours_avant">
                                </div>
                                
                                
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="cours_arriere">cours_arriere</label>
                                    </div>
                                    
                                    <input class="self-center size-12 border-2" type="checkbox" id="cours_arriere" name="cours_arriere" wire:model="exteriorForm.cours_arriere">
                                </div>
            
                            </div>
                        </div>
            
                        
        
                    </div>
                    
                    <div class="flex justify-evenly">
        
                        @if(!in_array($place_type, $not_living))
                            <div class="flex-col w-1/6 text-center">
                                <div class="m-2 text-center text-black text-lg font-semibold">
                                    <h5>Balcon</h5>
                                </div>
                                <div class="flex justify-evenly">
                                    
                                    <div class="flex flex-col">
                                        <img src="{{ asset('icons/balcony-window-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                        <div class="m-2 text-center text-black text-lg font-semibold">
                                            <label for="balcon_avant">balcon_avant</label>
                                        </div>
                                        <input class="self-center size-12 border-2" type="checkbox" id="balcon_avant" name="balcon_avant" wire:model="exteriorForm.balcon_avant">
                                    </div>
                                    
                                    
                                    <div class="flex flex-col">
                                        <img src="{{ asset('icons/balcony-window-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                        <div class="m-2 text-center text-black text-lg font-semibold">
                                            <label for="balcon_arriere">balcon_arriere</label>
                                        </div>
                                        <input class="self-center size-12 border-2" type="checkbox" id="balcon_arriere" name="balcon_arriere" wire:model="exteriorForm.balcon_arriere">
                                    </div>
                
                                </div>
                            </div>
        
        
                            <div class="flex-col w-1/6 text-center">
                                <div class="m-2 text-center text-black text-lg font-semibold">
                                    <h5>Terrasse</h5>
                                </div>
                                <div class="flex justify-evenly">
                                    
                                    
                                    <div class="flex flex-col">
                                        <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                        <div class="m-2 text-center text-black text-lg font-semibold">
                                            <label for="terrasse_avant">terrasse_avant</label>
                                        </div>
                                        <input class="self-center size-12 border-2" type="checkbox" id="terrasse_avant" name="terrasse_avant" wire:model="exteriorForm.terrasse_avant">
                                    </div>
                                    
                                    
                                    <div class="flex flex-col">
                                        <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                        <div class="m-2 text-center text-black text-lg font-semibold">
                                            <label for="terrasse_arriere">terrasse_arriere</label>
                                        </div>
                                        
                                        <input class="self-center size-12 border-2" type="checkbox" id="terrasse_arriere" name="terrasse_arriere" wire:model="exteriorForm.terrasse_arriere">
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <div class="flex-col w-1/6 text-center">
                            <div class="m-2 text-center text-black text-lg font-semibold">
                                <h5>Autres</h5>
                            </div>
                            <div class="flex justify-evenly">  
                                
                                <div class="flex flex-col">
                                    <img src="{{ asset('icons/security-guard-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                    <div class="m-2 text-center text-black text-lg font-semibold">
                                        <label for="securite">securite</label>
                                    </div>
                                    <input class="self-center size-12 border-2" type="checkbox" id="securite" name="securite" wire:model="exteriorForm.securite">
                                </div>
                                
                                @if(!in_array($place_type, $not_living))
                                    <div class="flex flex-col">
                                        <img src="{{ asset('icons/ecology-forest-garden-leaf-plant-tree-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                                        <div class="m-2 text-center text-black text-lg font-semibold">
                                            <label for="jardin">jardin</label>
                                        </div>
                                        <input class="self-center size-12 border-2" type="checkbox" id="jardin" name="jardin" wire:model="exteriorForm.jardin">
                                    </div>
                                @endif
        
                            </div>
                        </div>
        
                    </div>
        
                </div>

            </div>
            
            <div id="comodities" class="tabcontent hidden">
                
                <div class="ms-8">

                    <div class="flex justify-evenly">
        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/desk-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="meuble">meublé</label>
                            <input class="self-center size-12 border-2"  type="checkbox" id="meuble" name="meuble" wire:model="comoditiesForm.meuble">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/elevator-2-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="ascenseur">ascenseur</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="ascenseur" name="ascenseur" wire:model="comoditiesForm.ascenseur">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/gym-workout-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="gym">gym</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="gym" name="gym" wire:model="comoditiesForm.gym">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="vestitaire">vestitaire</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="vestitaire" name="vestitaire" wire:model="comoditiesForm.vestitaire">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="bar">bar</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="bar" name="bar" wire:model="comoditiesForm.bar">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="boite">boite</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="boite" name="boite" wire:model="comoditiesForm.boite">
                        </div>
        
                    </div>
        
                    <div class="flex justify-evenly">
        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="cuisine">cuisine</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="cuisine" name="cuisine" wire:model="comoditiesForm.cuisine">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="refrigerateur">refrigerateur</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="refrigerateur" name="refrigerateur" wire:model="comoditiesForm.refrigerateur">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="micro_onde">micro_onde</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="micro_onde" name="micro_onde" wire:model="comoditiesForm.micro_onde">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/washing-machine-laundry-cleaning-housekeeping-washing-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="lave_linge">lave_linge</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="lave_linge" name="lave_linge" wire:model="comoditiesForm.lave_linge">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/drink3-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="boisson">boisson</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="boisson" name="boisson" wire:model="comoditiesForm.boisson">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/food-restaurant-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="nourriture">nourriture</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="nourriture" name="nourriture" wire:model="comoditiesForm.nourriture">
                        </div>
        
                    </div>
        
                    <div class="flex justify-evenly">
        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="chauffe_eau">chauffe_eau</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="chauffe_eau" name="chauffe_eau" wire:model="comoditiesForm.chauffe_eau">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/air-conditioner-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="climatisation">climatisation</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="climatisation" name="climatisation" wire:model="comoditiesForm.climatisation">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/ventilator-fan-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="ventilation">ventilation</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="ventilation" name="ventilation" wire:model="comoditiesForm.ventilation">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/wifi-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="wifi">wifi</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="wifi" name="wifi" wire:model="comoditiesForm.wifi">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/office-space-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="groupe_electrogene">groupe_electrogene</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="groupe_electrogene" name="groupe_electrogene" wire:model="comoditiesForm.groupe_electrogene">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/trash-can-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="service_poubelle">service_poubelle</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="service_poubelle" name="service_poubelle" wire:model="comoditiesForm.service_poubelle">
                        </div>
        
                    </div>
                    
                    <div class="flex justify-evenly">
        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/cleaning-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="service_menage">service_menage</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="service_menage" name="service_menage" wire:model="comoditiesForm.service_menage">
                        </div>
                        
                        <div class="flex flex-col">
                            <img src="{{ asset('icons/washing-machine-5-svgrepo-com.svg') }}" class="size-12 mx-auto self-center">
                            <label class="m-2 text-center text-black text-lg font-semibold" for="service_linge">service_linge</label>
                            <input class="self-center size-12 border-2" type="checkbox" id="service_linge" name="service_linge" wire:model="comoditiesForm.service_linge">
                        </div>
        
                    </div>
                    
        
                </div>

            </div>
        </div>

        
        

        <div class="flex justify-end p-10">
            <button class="my-3 mx-5 py-2 px-10 text-xl text-white gradient uppercase font-semibold shadow-xl sm:rounded-lg" type="submit">Save</button>
        </div>
    
        
    </form>
</div>


<script>
    function openTabContent(tabId) {
      // Hide all tab content
      const tabContents = document.querySelectorAll('.tabcontent');
      tabContents.forEach((content) => {
        content.classList.add('hidden');
      });
  
      // Show the selected tab content
      const selectedTab = document.getElementById(tabId);
      if (selectedTab) {
        selectedTab.classList.remove('hidden');
      }
  
      // Remove the 'active' class from all tab buttons
      const tabButtons = document.querySelectorAll('.tablinks');
      tabButtons.forEach((button) => {
        button.classList.remove('active');
        button.classList.remove('bg-orange-300');
        button.classList.remove('border-orange-600');
        button.classList.add('border-gray-300');
      });
  
      // Add the 'active' class to the clicked tab button
      const clickedButton = document.querySelector(`[onclick="openTabContent('${tabId}')"]`);
      if (clickedButton) {
        clickedButton.classList.add('active');
        clickedButton.classList.add('bg-orange-300');
        clickedButton.classList.remove('border-gray-300');
        clickedButton.classList.add('border-orange-600');
      }
    }
  
    // Initialize the first tab
    // openTabContent('exterior');
</script>