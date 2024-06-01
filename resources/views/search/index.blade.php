<x-customer-layout>

    <div class="py-24 bg-white">
        <div class="max-w-7xl h-1/2 my-4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('search')
            </div>
        </div>
        <div class="max-w-7xl h-1/2 my-4 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('search-result')
            </div>
        </div>
    </div>

</x-customer-layout>