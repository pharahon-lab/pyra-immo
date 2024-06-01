<x-customer-layout>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('show-place-customer', ['place' => $place])
            </div>
        </div>
    </div>
</x-customer-layout>