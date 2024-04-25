<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finances') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-80 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-between mx-4 mt-2 mb-8">
                    <h3 class="object-left-top text-xl m-3 p-2 font-semibold">Vos Finances</h3>
                    <a class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  shadow-xl sm:rounded-lg" href="{{ route('catalogue.finances.retrait') }}">Retrait</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>