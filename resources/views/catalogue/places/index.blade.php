<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propriétées') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-80 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-between  mx-4 mt-2 mb-8">
                    <h3 class="object-left-top text-xl m-3 p-2 font-semibold">Vos Propriétées</h3>
                    <a class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  shadow-xl sm:rounded-lg" href="{{ route('catalogue.places.create') }}">Nouvelle propriétée</a>

                </div>
            </div>
        </div>

        
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="gradient min-h-40 overflow-hidden shadow-xl sm:rounded-lg p-3">

                
                <div class="flex justify-evenly">
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-white font-semibold m-4">{{ Auth::user()->fascadeImmo->countPlaces() }}</h4>
                        <h4 class="text-sm text-black font-semibold m-4">Vente</h4>
                    </div>
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-white font-semibold m-4">{{ Auth::user()->fascadeImmo->countPlaces() }}</h4>
                        <h4 class="text-sm text-black font-semibold m-4">Location</h4>
                    </div>
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-white font-semibold m-4">XXXXX</h4>
                        <h4 class="text-sm text-black font-semibold m-4">Terrain</h4>
                    </div>
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-white font-semibold m-4">XXXXX</h4>
                        <h4 class="text-sm text-black font-semibold m-4">Logement</h4>
                    </div>
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-white font-semibold m-4">XXXXX</h4>
                        <h4 class="text-sm text-black font-semibold m-4">Bureau</h4>
                    </div>
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-white font-semibold m-4">XXXXX</h4>
                        <h4 class="text-sm text-black font-semibold m-4">Commercial</h4>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>