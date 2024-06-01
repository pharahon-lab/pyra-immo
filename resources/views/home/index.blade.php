<x-customer-layout>

  
  @php
    $placeTypes = App\Enum\PlaceTypeEnum::cases();
    $commumes = App\Models\Communes::all();
  @endphp
    
      <!--Hero-->
      <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
          <!--Left Col-->
          <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">Pyra Immo</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
              Ne cherchez plus! Trouvez votre Propiétée!
            </h1>
            <p class="leading-normal text-2xl mb-8">
              Parcourez nos annonces et trouvez votre bonheur!
            </p>
            <a href="{{ route('showroom.index') }}" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
              Visiter notre catalogue de propriétées
            </a>
          </div>
          <!--Recherche-->
          <div class="w-full md:w-3/5 py-6 text-center">

            <form action='{{ route('showroom.search') }}'>
              @csrf 
              {{-- Achat / Location --}}
              <div class="flex justify-end my-4">
                <div class="mx-5">
                  <div class="m-2">
                  <label class="text-lg text-white" for="transaction"> Achat / Location</label>
                  </div>
                  <select class="rounded-full text-black" name="transaction" id="transaction">
                    <option value="tous">
                      <div class="flex justify-left text-black">
                          <span  class="">Tout</span>
                      </div>
                    </option>
                    <option value="achat">
                      <div class="flex justify-left text-black">
                          <span  class="">Achat</span>
                      </div>
                    </option>
                    <option value="location">
                      <div class="flex justify-left text-black">
                          <span  class="">Location</span>
                      </div>
                    </option>
                  </select>
                </div>  
              </div>

              <div class="mx-auto flex flex-wrap flex-col md:flex-row justify-end my-4">
                {{-- Commune --}}
                <div class="mx-5">
                  <div class="m-2">
                    <label class="text-lg text-white" for="commune"> Commune / Quartier</label>
                  </div>
                  <div>
                    <select class="rounded-full text-black" name="commune" id="commune">
                      
                      <option value="toutes">
                        <div class="flex justify-left text-black">
                            <span  class="">Toutes les communes</span>
                        </div>
                        
                      </option>

                      @foreach ($commumes as $commune)
                          <option value="{{$commune->id}}">
                            <div class="flex justify-left text-black">
                                <img class="px-2" src="{{ asset('flags/'.$commune->city->country->country_code.'.png') }}" style="height: 1rem">
                                <span  class="">{{  $commune->name  }} ({{  $commune->city->name  }} {{  $commune->city->country->country_code  }})</span>
                            </div>
                            
                          </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                {{-- Type Proprietée--}}
                <div class="mx-5">
                  <div class="m-2">
                    <label class="text-lg text-white" for="propriete"> Type de propriétée</label>
                  </div>
                  <div>
                    <select class="rounded-full text-black" name="propriete" id="propriete">
                      
                      <option value="tous">
                        <div class="flex justify-left text-black">
                            <span  class="">Tout types</span>
                        </div>
                      </option>
                      <option value="bureau">
                        <div class="flex justify-left text-black">
                            <span  class="">Bureau</span>
                        </div>
                      </option>
                      <option value="logement">
                        <div class="flex justify-left text-black">
                            <span  class="">Logement</span>
                        </div>
                      </option>
                      <option value="magasin">
                        <div class="flex justify-left text-black">
                            <span  class="">Magasin</span>
                        </div>
                      </option>
                      <option value="terrain">
                        <div class="flex justify-left text-black">
                            <span  class="">Terrain nu</span>
                        </div>
                      </option>
                      <option value="passage">
                        <div class="flex justify-left text-black">
                            <span  class="">Hotel/residence</span>
                        </div>
                      </option>
                    </select>
                  </div>
                </div>
              </div>

                <div class="flex justify-end px-4">
                  <button class="mx-5 lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Rechercher
                  </button>
                </div>

            </form>
          </div>
        </div>
      </div>

      <div class=" my-16 py-4 mx-auto px-16 sm:px-24 lg:px-48">

          <!-- Carousel Body -->
        <div class="relative rounded-lg block md:flex items-center bg-gray-100 shadow-xl" style="min-height: 19rem;">
          <div class="relative w-full md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg" style="min-height: 19rem;">
            <img class="absolute inset-0 w-full h-full object-cover object-center" src="https://stripe.com/img/v3/payments/overview/photos/missguided.jpg" alt="">
            <div class="absolute inset-0 w-full h-full bg-orange-600 opacity-75"></div>
            
          </div>
          <div class="w-full md:w-3/5 h-full flex items-center bg-gray-100 rounded-lg">
            <div class="p-12 md:pr-24 md:pl-16 md:py-12">
              <p class="absolute top-0 right-0 text-orange-700 m-6 text-lg font-semibold"> Prix F CFA</p>
              <p class="top-0 right-0 text-orange-700 text-lg py-1 font-semibold"> Type</p>
              <p class="top-0 right-0 text-orange-700 text-lg py-1 font-semibold"> commune</p>
              <p class="top-0 right-0 text-orange-700 text-lg py-1 font-semibold"> pièces/salle d'eau</p>
              <p class="top-0 right-0 text-orange-700 text-lg py-1 font-semibold"> Offre</p>
              
            </div>
            <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-gray-100 -ml-12" viewBox="0 0 100 100" preserveAspectRatio="none">
              <polygon points="50,0 100,0 50,100 0,100" />
            </svg>
          </div>
          <button class="absolute top-0 mt-32 left-0 bg-white rounded-full shadow-md h-12 w-12 text-2xl text-orange-600 hover:text-orange-400 focus:text-orange-400 -ml-6 focus:outline-none focus:shadow-outline">
            <span class="block" style="transform: scale(-1);">&#x279c;</span>
          </button>
          <button class="absolute top-0 mt-32 right-0 bg-white rounded-full shadow-md h-12 w-12 text-2xl text-orange-600 hover:text-orange-400 focus:text-orange-400 -mr-6 focus:outline-none focus:shadow-outline">
            <span class="block" style="transform: scale(1);">&#x279c;</span>
          </button>
        </div>
        
        <!-- Carousel Tabs -->
        <div class="flex items-center py-5 justify-between">
            @foreach ($placeTypes as $placeType)
              <button class="px-2 opacity-80 hover:opacity-100 focus:opacity-100 text-black text-lg font-semibold hover:text-orange-600 focus:text-orange-600 bg-white rounded-xl"> <p class="">{{ $placeType->name }}</p> </button>             
            @endforeach
        </div>      

      </div>
    

      {{-- PRESENTATION DE LA PLATEFORME --}}
      <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
          <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Pyra Immo
          </h2>
          <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="flex flex-wrap">
            <div class="w-5/6 sm:w-1/2 p-6">
              <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                LA plateforme d'annonces immobilières
              </h3>
              <p class="text-gray-600 mb-8">
                Trouvez rapidement la maison de vos rêves. En quelques clics naviguez à travers <br>
                les catalogues des démarcheurs et entreprises immobilières.                 
                <br />
                <br />
  
                Retrouvez nous sur le Play Store
  
                <a class="text-orange-500 underline" href="https://undraw.co/">Pyra Immo</a>
              </p>
            </div>
            <div class="w-full sm:w-1/2 p-6">
              <img src="{{ asset('images/playstore.svg') }}" class="size-40 m-auto">
            </div>
          </div>
          <div class="flex flex-wrap flex-col-reverse sm:flex-row">
            <div class="w-full sm:w-1/2 p-6 mt-6">
              <img src="{{ asset('images/pass3.svg') }}" class="size-40 m-auto">
            </div>
            <div class="w-full sm:w-1/2 p-6 mt-6">
              <div class="align-middle">
                <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                  Pass visites
                </h3>
                <p class="text-gray-600 mb-8">
                  Utilisez votre passe visite pour rechercher et consulter les contacts d'une maison ou naviguez librement dans les catalogues.
                  <br />
                  <br />  
                  Consultez nos offres de pass: 
  
                  <a class="text-orange-500 underline" href="#pass_prix">offres pass visite</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>


      {{-- Main places --}}
      <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
          <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Annonces
          </h2>
          <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
        </div>
          <div class="grid grid-cols-5 grid-rows-2 gap-2 w-full max-w-6xl mx-auto">
            @foreach ($places as $plac)
                <div wire:key="{{ $plac->id }}">
                    @livewire('place-card-customer', ["place" => $plac, key($plac->id)])
                </div>
                
            @endforeach
        </div>
      </section>

      {{-- PRIX PASS --}}
      <section class="bg-gray-100 py-8" id="pass_prix">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
          <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Prix Pass
          </h2>
          <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">

            @foreach ($pass_types as $pass_ty)
              @livewire('pass-type-card', ['passType' => $pass_ty])
            @endforeach


          </div>
        </div>
      </section>

      {{-- PUBLICATION ANNONCE  --}}
      <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
          <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Poster des annonces
          </h2>
          <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                  Particuliers
                </p>
                <div class="w-full font-bold text-xl text-gray-800 px-6">
                  Nous offrons plusieurs plusieurs offres pour particuliers.
                </div>
                <p class="text-gray-800 text-base px-6 mb-5">
                    Avec Pyra Immo vous obtenez un poucentage pour chaque consultation de vos offres. <br>
                     Consultez nos offres pour particuliers.
                </p>
              </a>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="flex items-center justify-center">
                <a  href="#personnal_offers" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Offres particuliers
                </a>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                  Agence immobilière
                </p>
                <div class="w-full font-bold text-xl text-gray-800 px-6">
                    Vous êtes une agence? Vous avez besoin de visibilitée? <br>
                    Vous êtes au bon endroit.

                </div>
                <p class="text-gray-800 text-base px-6 mb-5">
                    Avec Pyra Immo vous obtenez un poucentage pour chaque consultation de vos offres. <br>
                     Consultez nos offres pour Agences.
                </p>
              </a>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="flex items-center justify-center">
                <a href="#company_offers" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Offres Agences
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      {{-- Prix Particulier --}}
      <section id='personnal_offers' class="bg-orange-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
          <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Prix Démarcheur
          </h2>
          <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
            
            @foreach ($abonnement_types as $ab_ty)
                @if ($ab_ty->type === 'personal')
                @livewire('abonnement-type-card', ['abonnementType' => $ab_ty])
                @endif 
            @endforeach
          </div>
        </div>
      </section>

      {{-- Prix Company --}}
      <section id='company_offers' class="bg-gray-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
          <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Prix Agence
          </h2>
          <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
            @foreach ($abonnement_types as $ab_ty)
                @if ($ab_ty->type === 'company')
                  @livewire('abonnement-type-card', ['abonnementType' => $ab_ty])
                @endif 
            @endforeach
          </div>
        </div>
      </section>


</x-customer-layout>