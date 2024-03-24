<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                  Prix Démarcheur
                </h2>
                <div class="w-full mb-4">
                  <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
                <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 mx-4 sm:my-4">
                    @foreach ($abonnement_types as $ab_ty)
                        @if ($ab_ty->type === 'personal')
                            <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
                            <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                                <div class="p-8 text-3xl font-bold text-center border-b-4">
                                {{ $ab_ty->title }}
                                </div>
                                <ul class="w-full text-center text-sm">
                                    <li class="border-b py-4">{{ $ab_ty->max_place }} propriétées max</li>
                                    @if ($ab_ty->has_freeview)
                                        <li class="border-b py-4">{{ $ab_ty->freeviews }} Free View</li>
                                    @else
                                        <li class="border-b py-4">Pas d'accès au Free View</li>
                                    @endif
                                    <li class="border-b py-4">{{ $ab_ty->max_image }} images / propriétée</li>
                                    <li class="border-b py-4">{{ $ab_ty->pourcentage_demarcheur }} % par visites payantes</li>
                                </ul>
                            </div>
                            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                                <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                                    {{ $ab_ty->price }} f cfa
                                <div>
                                    <span class="text-base">Pour {{ $ab_ty->max_user }} utilisateur</span>
                                </div>
                                </div>
                                <div class="flex items-center justify-center">
                                    <a href="{{ route('catalogue.abonnement.index') }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    S'abonner
                                    </a>
                                </div>
                            </div>
                            </div>
                        @endif 
                    @endforeach
                </div>

                
                <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Prix Agence
                </h2>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
                <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 mx-4 sm:my-4">
                    @foreach ($abonnement_types as $ab_ty)
                        @if ($ab_ty->type === 'company')
                        <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
                          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                            <div class="w-full p-8 text-3xl font-bold text-center">{{ $ab_ty->title }}</div>
                            <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
                            <ul class="w-full text-center text-base font-bold">
                                <li class="border-b py-4">{{ $ab_ty->max_place }} propriétées max</li>
                                <li class="border-b py-4">{{ $ab_ty->freeviews }} Free View</li>
                                <li class="border-b py-4">{{ $ab_ty->max_image }} images / propriétée</li>
                                <li class="border-b py-4">{{ $ab_ty->max_video }} videos ({{ $ab_ty->max_video_second }} seconds) / propriétée</li>
                            </ul>
                          </div>
                          <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                            <div class="w-full pt-6 text-4xl font-bold text-center">
                                {{ $ab_ty->price }} fcfa
                              <div>
                                <span class="text-base"> + {{ $ab_ty->user_price }} f cfa/ Par utilisateur ({{ $ab_ty->max_user }} max)</span>
                              </div>
                            </div>
                            <div class="flex items-center justify-center">
                              <a href="{{ route('catalogue.abonnement.index') }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                S'abonner
                              </a>
                            </div>
                          </div>
                        </div>
                        @endif 
                    @endforeach
                </div>



            </div>
        </div>
    </div>
</x-app-layout>