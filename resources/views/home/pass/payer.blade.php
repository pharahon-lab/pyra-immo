<x-customer-layout>

    {{-- PRIX PASS --}}
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800 h-full">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Prix Pass
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            @livewire('pass-buy-card', ['pass' => $pass_type])
        </div>
    </section>

</x-customer-layout>