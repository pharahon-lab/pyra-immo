<x-customer-layout>

  
  @php
    $pass_types = App\Models\PassType::all();
    $pass = Session('pass');
  @endphp

    
      {{-- PRIX PASS --}}
      <section class="bg-gray-100 py-8 my-8">
        @if ($pass)
          <div class="flex justify-center my-5">
            <h3 class="text-lg text-orange-500 mx-4">{{ $pass->nb_visite }} visite(s)</h3>
            <h3 class="text-lg text-orange-500 mx-4">expire le {{ $pass->end_date }}</h3>
          </div>
        @endif
        
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800 h-full">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Prix Pass
        </h2>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">

            @foreach ($pass_types as $pass_ty)
            <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-4 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
              <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                  <div class="w-full p-8 text-3xl font-bold text-center">{{ $pass_ty->name }}</div>
                  <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
                  <ul class="w-full text-center text-base font-bold">
                    <li class="border-b py-4">{{ $pass_ty->nb_visite }} visites</li>
                  </ul>
              </div>
              <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                  <div class="w-full pt-6 text-4xl font-bold text-center">
                    {{ $pass_ty->price }} f cfa
                  </div>
                  <div class="flex items-center justify-center">
                    <a  href="{{ route('home.pass.payer', ['pass_type' => $pass_ty]) }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Payer
                    </a>
                  </div>
              </div>
            </div>
                
            @endforeach


        </div>
        </div>
      </section>



</x-customer-layout>