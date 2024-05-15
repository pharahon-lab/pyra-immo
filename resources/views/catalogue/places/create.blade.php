<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propriétées') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white h-full overflow-hidden shadow-xl sm:rounded-lg">

                @livewire('create-place')
            </div>
        </div>
    </div>
</x-app-layout>