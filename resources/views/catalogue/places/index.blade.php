<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propriétées') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-80 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-between">
                    <h3 class="object-left-top m-3 p-2 font-semibold">Vos Proriétées</h3>
                    <a class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  shadow-xl sm:rounded-lg" href="{{ route('catalogue.places.create') }}">Ajouter propriétée</a>

                </div>
            </div>
        </div>

        
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-3">
            <div class="bg-white min-h-40 overflow-hidden shadow-xl sm:rounded-lg p-3">
                
                <div class="flex justify-evenly">
                    <div class="flex max-w-40 items-center text-black bg-white  rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Vente</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2 m-3">
                        <div>
                            <div>
                                <strong>Location</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Terrain</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Logement</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Bureau</strong>
                            </div>
                            <div>
                                <span>XXXXX</span>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="flex max-w-40 items-center text-black bg-white rounded-lg p-2">
                        <div>
                            <div>
                                <strong>Commercial</strong>
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