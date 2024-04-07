<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-80 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-between">
                    <h3 class="object-left-top m-3 p-2 font-semibold">Abonnement</h3>
                    <a class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  shadow-xl sm:rounded-lg" href="{{ route('catalogue.abonnement.create') }}">Nouvel abonnement</a>
                </div>
                <div class="m-6">
                    <h3 class="text-orange-600 text-2xl font-bold flex justify-center">Pas d'abonnement en cours</h3>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>