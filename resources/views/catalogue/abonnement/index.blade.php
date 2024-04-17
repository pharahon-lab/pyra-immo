<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-80 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-between">
                    <h3 class="object-left-top m-3 p-2 font-semibold">Abonnement</h3>
                    <a class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  shadow-xl sm:rounded-lg" href="{{ route('catalogue.abonnement.create') }}">Nouvel abonnement</a>
                </div>
                <div class="m-6">
                    <h3 class="text-orange-600 text-2xl font-bold flex justify-center">{{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->title }}</h3>
                </div>
                <div class="flex w-full justify-evenly">
                    <h4 class="text-lg text-black font-semibold m-4">{{ Auth::user()->fascadeImmo->latestAbonnement->start_date }}</h4>
                    <h4 class="text-lg text-black font-semibold m-4">{{ Auth::user()->fascadeImmo->latestAbonnement->end_date }}</h4>
                </div>

                <div class="mx-8">
                    <div class="flex justify-evenly">
                        <div class="flex-col">
                            <h4 class="text-lg text-center text-orange-500 font-semibold m-4">{{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->max_place }}</h4>
                            <h4 class="text-xs text-gray-600 font-semibold m-4">Propriétèes max</h4>
                        </div>
                        <div class="flex-col">
                            <h4 class="text-lg text-center text-orange-500 font-semibold m-4">{{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->max_image }}</h4>
                            <h4 class="text-xs text-gray-600 font-semibold m-4">Images par propriétées</h4>
                        </div>
                        <div class="flex-col">
                            <h4 class="text-lg text-center text-orange-500 font-semibold m-4">{{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->max_video }}</h4>
                            <h4 class="text-xs text-gray-600 font-semibold m-4">Videos par propriétées ({{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->max_video_second }} secondes)</h4>
                        </div>
                        <div class="flex-col">
                            <h4 class="text-lg text-center text-orange-500 font-semibold m-4">{{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->freeviews }}</h4>
                            <h4 class="text-xs text-gray-600 font-semibold m-4">Feeviews </h4>
                        </div>
                        <div class="flex-col">
                            <h4 class="text-lg text-center text-orange-500 font-semibold m-4">{{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->max_user }} / {{ Auth::user()->fascadeImmo->latestAbonnement->abonnement_type->max_user }}</h4>
                            <h4 class="text-xs text-gray-600 font-semibold m-4">Utilisateurs</h4>
                        </div>
                    </div>
                
                </div>

            </div>
        </div>
    </div>
</x-app-layout>