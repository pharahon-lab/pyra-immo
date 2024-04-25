<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abonnement') }}
        </h2>
    </x-slot>
    
    
<script type="text/javascript"> 
    function isCompany(is_comp) { 
        var part = document.getElementById("particulier");
        var comp = document.getElementById("company");

        var part_label = document.getElementById("particulier_label");
        var comp_label = document.getElementById("company_label");

        if (is_comp) {
            part.style.display ="none";
            comp.style.display ="block";  

            comp_label.classList.add("shadow-xl");
            comp_label.classList.remove("bg-white");
            comp_label.classList.remove("text-black");
            comp_label.classList.add("gradient");
            comp_label.classList.add("text-white");

            part_label.classList.remove("shadow-xl");
            part_label.classList.remove("text-white");
            part_label.classList.remove("gradient");
            part_label.classList.add("bg-white");
            part_label.classList.add("text-black");
        } else {
            part.style.display ="block";
            comp.style.display  ="none";

            part_label.classList.add("shadow-xl");
            part_label.classList.remove("bg-white");
            part_label.classList.remove("text-gray-800");
            part_label.classList.add("gradient");
            part_label.classList.add("text-white");

            comp_label.classList.remove("shadow-xl");
            comp_label.classList.remove("text-white");
            comp_label.classList.remove("gradient");
            comp_label.classList.add("bg-white");
            comp_label.classList.add("text-gray-800");

        }
    } 
    </script>


    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-evenly mt-6">
                    <div>
                        <button onclick="isCompany(false)"  id='particulier_label' class="w-70 rounded-full px-6 my-2 mx-10 text-3xl leading-tight text-center text-white shadow-xl gradient border-2">
                            Prix Démarcheur
                        </button>

                    </div>
                    <div></div>
                    <div>
                        <button onclick="isCompany(true)"  id='company_label' class="w-70 rounded-full px-6 my-2 mx-10 text-3xl leading-tight text-center text-gray-800 border-2">
                            Prix Agence
                        </button>

                    </div>

                </div>
                
                <div id='particulier' style="visibility : visible">
                    <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 mx-4 sm:my-4">
                        @foreach ($abonnement_types as $ab_ty)
                            @if ($ab_ty->type === 'personal')
                                <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-3 rounded-none lg:rounded-l-lg shadow-lg bg-white mt-4">
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
                                        {{ $ab_ty->price }} f cfa / mois
                                    <div>
                                        <span class="text-base">Pour {{ $ab_ty->max_user }} utilisateur</span>
                                    </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <a href="{{ route('catalogue.abonnement.resume', ['ab_type' => $ab_ty]) }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Payer
                                        </a>
                                    </div>
                                </div>
                                </div>
                            @endif 
                        @endforeach
                    </div>

                </div>
                <div id='company'  style="display : none">
                    <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 mx-4 sm:my-4">
                        @foreach ($abonnement_types as $ab_ty)
                            @if ($ab_ty->type === 'company')
                            <div class="flex flex-col w-5/6 lg:w-1/4 mx-3 lg:mx-3 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
                            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                <div class="w-full p-8 text-3xl font-bold text-center">{{ $ab_ty->title }}</div>
                                <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
                                <ul class="w-full text-center text-base font-bold">
                                    <li class="border-b py-4">{{ $ab_ty->max_place }} propriétées max</li>
                                    <li class="border-b py-4">{{ $ab_ty->freeviews }} Free View</li>
                                    <li class="border-b py-4">{{ $ab_ty->max_image }} images / propriétée</li>
                                    <li class="border-b py-4">{{ $ab_ty->max_video }} videos ({{ $ab_ty->max_video_second }} seconds) / propriétée</li>
                                    <li class="border-b py-4">{{ $ab_ty->pourcentage_demarcheur }} % par visites payantes</li>
                                </ul>
                            </div>
                            <div class="flex-none bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                                @if ($ab_ty->promo_general)
                                    <div class="flex justify-center w-all m-2 px-2">
                                        <h4  class="mx-2 text-lg text-orange-600 line-through font-semibold">{{ $ab_ty->price}}  F CFA</h4>
                                        <h4  class="mx-2 text-lg">( - {{ $ab_ty->promo_general->reduction }}% )</h4>
                                    </div>
                                    <div class="flex justify-center w-all m-2 px-2">
                                        <h3  class="mx-2 font-bold text-3xl text-orange-600" >{{ ($ab_ty->price / 100) * (100 - $ab_ty->promo_general->reduction) }} F CFA / mois</h3>
                                    </div>
                                    
                                @else
                                    <div class="w-full pt-6 text-3xl font-bold text-center text-orange-600">
                                        {{ $ab_ty->price }} F CFA / mois
                                    </div>
                                    
                                @endif
                                    <span class="text-base flex justify-center"> + {{ $ab_ty->user_price }} f cfa/ Par utilisateur ({{ $ab_ty->max_user }} max)</span>
                                <div class="flex items-center justify-center">
                                    <a href="{{ route('catalogue.abonnement.resume', ['ab_type' => $ab_ty]) }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Payer
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
    </div>

</x-app-layout>