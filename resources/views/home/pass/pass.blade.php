<x-customer-layout>
    
    {{-- PRIX PASS --}}
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 my-40 text-gray-800 h-full">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Votre Pass
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
                <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-4 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                        <div class="w-full p-8 text-xl font-bold text-center">{{ $pass->nb_visite }} visites</div>
                        <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
                    </div>
                    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                        <div class="w-full pt-6 text-4xl font-bold text-orange-600 text-center">
                            {{ $pass->code }}
                        </div>
                        <p class="w-full text-center text-base py-4" >Expire le:  {{ $pass->end_date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-customer-layout>