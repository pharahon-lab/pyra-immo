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

                        <p class="m-2 text-sm font-medium text-orange">facade type</p>

                    </div>

                    <h3 class="mt-8 mb-4 text-xl font-medium text-green-900">
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

                <div class="flex justify-evenly">
                    <div class="flex max-w-40 items-center text-black bg-white  rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Propriétées</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2 m-3">
                        <div>
                            <div>
                                <strong>Freeview</strong>
                            </div>
                            <div>
                                <span>XXXXX Propriétées</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Visites Totals</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Abonnement</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex justify-evenly">
                    <div class="flex max-w-50 items-center text-black bg-white  rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Vues cette semaine</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2 m-3">
                        <div>
                            <div>
                                <strong>Vues du mois</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-50 items-center text-black bg-white rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Visites cette semaine</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Visites du mois</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
