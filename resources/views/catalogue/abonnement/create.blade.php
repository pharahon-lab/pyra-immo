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
                                @livewire('abonnement-type-card', ['abonnementType' => $ab_ty])
                            @endif 
                        @endforeach
                    </div>

                </div>
                <div id='company'  style="display : none">
                    <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 mx-4 sm:my-4">
                        @foreach ($abonnement_types as $ab_ty)
                            @if ($ab_ty->type === 'company')
                                @livewire('abonnement-type-card', ['abonnementType' => $ab_ty])
                            @endif 
                        @endforeach
                    </div>

                </div>       



            </div>
        </div>
    </div>

</x-app-layout>