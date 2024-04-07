<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abonnement') }}
        </h2>
        
    </x-slot>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <script>
        function payer(prix, lastname, firstname, email, phone ) {
            console.log('strart');
            CinetPay.setConfig({
                apikey: '172681575365f9bc1b5c0620.47500971',//   YOUR APIKEY
                site_id: '5868225',//YOUR_SITE_ID
                // notify_url: 'http://mondomaine.com/notify/',
            });
            console.log('check');
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(),
                amount: prix,
                currency: 'XOF',
                channels: 'ALL',
                description: 'Test de paiement',   
                 //Fournir ces variables pour le paiements par carte bancaire
                customer_name:lastname,//Le nom du client
                customer_surname:firstname,//Le prenom du client
                customer_email: email,//l'email du client
                customer_phone_number: phone,//le telephone du client

            });
            console.log('check');
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    if (alert("Votre paiement a été effectué avec succès")) {
                        window.location.reload();
                    }
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    </script>

    @php        
        $tt = '1';

    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-80 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-12">
                    <div class="flex justify-between w-4/6 px-2 mb-8 border-b-2 border-dashed">
                        <h4  class="mx-2 my-4 text-xl">Abonnement : </h4>
                        <h3  class="mx-2 my-4  font-bold text-2xl text-orange-700">{{ $abonnement_type->title }}</h3>
                    </div>
                    
                    <div class="flex justify-between w-4/6 px-2 border-b-2 border-dashed">
                        <h4  class="mx-2 my-4 text-base">Type : </h4>
                        <h3  class="mx-2 my-4  font-semibold text-lg">{{ $abonnement_type->type }}</h3>
                    </div>
                    
                    {{-- SERVICES --}}
                    {{-- maw place --}}
                    <div class="flex justify-between w-4/6 px-2 border-b-2 border-dashed">
                        <h4  class="mx-2 my-4 text-base">Nombre de propriétées  : </h4>
                        <h3  class="mx-2 my-4  font-semibold text-lg">{{ $abonnement_type->max_place }} propriétées max</h3>
                    </div>

                    {{-- freeview --}}
                    <div class="flex justify-between w-4/6 px-2 border-b-2 border-dashed">
                        <h4  class="mx-2 my-4 text-base"> Free View : </h4>
                        <h3  class="mx-2 my-4 font-semibold text-lg">{{ $abonnement_type->freeviews }} Free View</h3>
                    </div>

                    {{-- pourcentage --}}
                    <div class="flex justify-between w-4/6 px-2 border-b-2 border-dashed">
                        <h4  class="mx-2  my-4 text-base">Pourcentage : </h4>
                        <h3  class="mx-2  my-4 font-semibold text-lg">{{ $abonnement_type->pourcentage_demarcheur }} % par visites payantes</h3>
                    </div>

                    
                    {{-- Images --}}
                    <div class="flex justify-between w-4/6 px-2 border-b-2 border-dashed">
                        <h4  class="mx-2 my-4 text-base">Images : </h4>
                        <h3  class="mx-2 my-4 font-semibold text-lg">{{ $abonnement_type->max_image }} images / propriétée</h3>
                    </div>
                    
                    {{-- videos --}}
                    <div class="flex justify-between w-4/6 px-2 border-b-2 border-dashed">
                        <h4  class="mx-2 my-4 text-base">Videos : </h4>
                        <h3  class="mx-2 my-4 font-semibold text-lg">{{ $abonnement_type->max_video }} videos ({{ $abonnement_type->max_video_second }} seconds) / propriétée</h3>
                    </div>
                    
                    {{-- user --}}
                    <div class="flex justify-between w-4/6 px-2 border-b-2 border-dashed">
                        <h4  class="mx-2 my-4 text-base">Utilisateurs : </h4>
                        <h3  class="mx-2 my-4 font-semibold text-lg">{{ $abonnement_type->user_price }} f cfa/ Par utilisateur ({{ $abonnement_type->max_user }} max)</h3>
                    </div>

                    <div class="my-6">
                        <button onclick="{{ $tt +1 }} = checkPromoCode({{ $abonnement_type }}, 'Coooode')">Vérifier le code</button>
                    </div>

                    <div class="flex justify-between py-5">
                        {{-- PRICE --}}
                        @if ($abonnement_type->promo_general)
                            <div class="flex justify-end w-all mx-10 px-2">
                                <h4  class="mx-2 my-4 text-2xl">Prix : </h4>
                                <h4  class="mx-2 my-4 text-2xl text-orange-600 line-through font-semibold">{{ $abonnement_type->price}}  F CFA</h4>
                                <h4  class="mx-2 my-4 text-2xl">( - {{ $abonnement_type->promo_general->reduction }}% )</h4>
                                <h3  class="mx-2 my-4 font-bold text-4xl text-orange-600" >{{ ($abonnement_type->price / 100) * (100 - $abonnement_type->promo_general->reduction) }} F CFA</h3>
                            </div>
                            
                        @else
                            <div class="flex justify-end w-all mx-10 px-2">
                                <h4  class="mx-2 my-4 text-2xl">Prix : </h4>
                                <h3  class="mx-2 my-4 font-bold text-4xl text-orange-600" font-semibold>{{ $abonnement_type->price }} F CFA</h3>
                            </div>
                            
                        @endif
                        <button class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  font-semibold shadow-xl sm:rounded-lg" onclick="payer('{{ $abonnement_type->price }}', '{{ Auth::user()->lastname }}', '{{ Auth::user()->firstname }}', '{{ Auth::user()->email }}', '{{ Auth::user()->phone }}')">Payer avec Cinetpay</button>


                    </div>


                </div>
                <div class="sdk">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>