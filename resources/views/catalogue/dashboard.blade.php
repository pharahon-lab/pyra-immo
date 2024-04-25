<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalogue') }}
        </h2>
    </x-slot>

    <div class="py-12">

        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="bg-white overflow-hidden  shadow-xl sm:rounded-lg p-3">
                <div class="flex justify-evenly">
                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                        {{ Auth::user()->name}}
                    </h1>

                    <h4 class="mt-8 mb-4 text-l font-medium text-green-900">
                        {{ Auth::user()->phone}}
                    </h4>
                    <h4 class="mt-8 mb-4 text-l font-medium text-green-900">
                        {{ Auth::user()->email}}
                    </h4>
                    <h4 class="mt-8 mb-4 text-xl font-medium text-green-900">
                        {{ Auth::user()->fascadeImmo->name}}
                    </h4>

                </div>

            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="bg-white min-h-80 overflow-hidden  shadow-xl sm:rounded-lg px-8">
                <div class="flex justify-between">
                    <div>
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                            {{ Auth::user()->fascadeImmo->name}}
                        </h1>

                        <p class="m-2 text-sm font-medium text-orange">{{ Auth::user()->fascadeImmo->type}}</p>

                    </div>

                    <h3 class="mt-8 mb-4 text-xl font-medium  text-orange-500">
                        {{ Auth::user()->fascadeImmo->balance}} f CFA
                    </h3>

                </div>

                <div class="flex justify-end p-3">
                    <h4 class="m-2 text-l font-medium text-black">
                        {{ Auth::user()->fascadeImmo->phone}}
                    </h4>
                    <h4 class="m-2 text-l font-medium text-black">
                        {{ Auth::user()->fascadeImmo->email}}
                    </h4>

                </div>

                <div class="flex justify-evenly m-4">
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-orange-500 font-semibold m-4">{{ Auth::user()->fascadeImmo->countPlaces() }}</h4>
                        <h4 class="text-xs text-gray-600 font-semibold m-4">Propriétées</h4>
                    </div>

                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-orange-500 font-semibold m-4">XXXXX</h4>
                        <h4 class="text-xs text-gray-600 font-semibold m-4">Propriétées en freeview</h4>
                    </div>

                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-orange-500 font-semibold m-4">XXXXX</h4>
                        <h4 class="text-xs text-gray-600 font-semibold m-4">Visites Totals</h4>
                    </div>

                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-orange-500 font-semibold m-4">{{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->title }}</h4>
                        <h4 class="text-xs text-gray-600 font-semibold m-4">Abonnement</h4>
                    </div>
                </div>


                <div class="flex justify-evenly m-4">

                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-orange-500 font-semibold m-4">XXXXX</h4>
                        <h4 class="text-xs text-gray-600 font-semibold m-4">Vues cette semaine</h4>
                    </div>
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-orange-500 font-semibold m-4">XXXXX</h4>
                        <h4 class="text-xs text-gray-600 font-semibold m-4">Vues ce mois</h4>
                    </div>
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-orange-500 font-semibold m-4">XXXXX</h4>
                        <h4 class="text-xs text-gray-600 font-semibold m-4">Visites cette semaine</h4>
                    </div>
                    
                    <div class="flex-col">
                        <h4 class="text-lg text-center text-orange-500 font-semibold m-4">XXXXX</h4>
                        <h4 class="text-xs text-gray-600 font-semibold m-4">Visites ce mois</h4>
                    </div>

                    
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
