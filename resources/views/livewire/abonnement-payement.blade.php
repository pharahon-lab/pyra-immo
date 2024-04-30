

<div class="px-12">
    <div class="flex flex-row w-full">
        <div class="flex-col w-4/6">
            <div class="flex justify-between w-4/6 px-2 mb-8 border-b-2 border-dashed">
                <h4  class="mx-2 my-4 text-xl">Abonnement : </h4>
                <h3  class="mx-2 my-4  font-bold text-2xl text-orange-700">{{ $abonnement_type->title }}</h3>
            </div>
            <div class="flex justify-between px-2 border-b-2 border-dashed">
                <h4  class="mx-2 my-4 text-base">Type : </h4>
                <h3  class="mx-2 my-4  font-semibold text-lg">{{ $abonnement_type->type }}</h3>
            </div>

            {{-- SERVICES --}}
            {{-- maw place --}}
            <div class="flex justify-between px-2 border-b-2 border-dashed">
                <h4  class="mx-2 my-4 text-base">Nombre de propriétées  : </h4>
                <h3  class="mx-2 my-4  font-semibold text-lg">{{ $abonnement_type->max_place }} propriétées max</h3>
            </div>

            {{-- freeview --}}
            <div class="flex justify-between px-2 border-b-2 border-dashed">
                <h4  class="mx-2 my-4 text-base"> Free View : </h4>
                <h3  class="mx-2 my-4 font-semibold text-lg">{{ $abonnement_type->freeviews }} Free View</h3>
            </div>

            {{-- pourcentage --}}
            <div class="flex justify-between px-2 border-b-2 border-dashed">
                <h4  class="mx-2  my-4 text-base">Pourcentage : </h4>
                <h3  class="mx-2  my-4 font-semibold text-lg">{{ $abonnement_type->pourcentage_demarcheur }} % par visites payantes</h3>
            </div>

            {{-- Images --}}
            <div class="flex justify-between px-2 border-b-2 border-dashed">
                <h4  class="mx-2 my-4 text-base">Images : </h4>
                <h3  class="mx-2 my-4 font-semibold text-lg">{{ $abonnement_type->max_image }} images / propriétée</h3>
            </div>

            {{-- videos --}}
            <div class="flex justify-between px-2 border-b-2 border-dashed">
                <h4  class="mx-2 my-4 text-base">Videos : </h4>
                <h3  class="mx-2 my-4 font-semibold text-lg">{{ $abonnement_type->max_video }} videos ({{ $abonnement_type->max_video_second }} seconds) / propriétée</h3>
            </div>
    
            {{-- user --}}
            <div class="flex justify-between px-2 border-b-2 border-dashed">
                <h4  class="mx-2 my-4 text-base">Utilisateurs : </h4>
                <h3  class="mx-2 my-4 font-semibold text-lg">{{ $abonnement_type->user_price }} f cfa/ Par utilisateur ({{ $abonnement_type->max_user }} max)</h3>
            </div>

        </div>
        <div class="flex flex-col justify-evenly p-4">
            <button id="m1" wire:click="timeline(1)" class="rounded-full border-2 semibold text-lg border-orange-600 bg-orange-300 px-6 mx-auto">1 Mois -> {{ $abonnement_type->price}}  F CFA</button>

            <button id="m3" wire:click="timeline(3)" class="rounded-full border-2 semibold text-lg border-grey-600 px-6 mx-auto">3 Mois -> {{ ($abonnement_type->price *3 ) *0.95 }}  F CFA</button>

            <button id="m6"  wire:click="timeline(6)" class="rounded-full border-2 semibold text-lg border-grey-600 px-6 mx-auto">6 Mois -> {{ ( $abonnement_type->price *6 ) * 0.90}}  F CFA</button>
            {{-- <button id="6mois" wire:click="timeline({{ 6 }})" class="rounded-full border-2 semibold text-lg px-6 mx-auto">6 Mois -> {{ ( $abonnement_type->price *6 ) * 0.90}}  F CFA</button> --}}

            <button id="m12" wire:click="timeline(12)" class="rounded-full border-2 semibold text-lg border-grey-600 px-6 mx-auto">1 an -> {{ ( $abonnement_type->price *12 ) *0.85 }}  F CFA</button>

        </div>
    </div>

    

    <div class="my-6">
        <button ></button>
        
        <form wire:submit="checkPromo">
            @csrf

            <div class="flex justify-center">
                <input class="mx-4 rounded-full" type="text" name="promotion_code"  wire:model="promotion_code">
                <button class="bg-white mx-2 px-4 font-bold rounded-full shadow-lg" type="submit"> Vérifier le code </button>
            </div>
            @error('promotion_code') <span class="error">{{ $message }}</span> @enderror
        </form>
    </div>

    <div class="flex justify-around  py-5">
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
                @if ($promotion)
                    <div class="flex">
                        <h3  class="mx-2 my-4 font-bold text-1xl text-orange-300 line-through" font-semibold>{{ $price_base }} F CFA</h3>
                        <h3  class="mx-2 my-4 font-bold text-4xl text-orange-600" font-semibold>{{ $price }} F CFA</h3>
                    </div>
                    
                @else
                    <h3  class="mx-2 my-4 font-bold text-4xl text-orange-600" font-semibold>{{ $price }} F CFA</h3>
                    
                @endif
            </div>
            
        @endif
        {{-- <button class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  font-semibold shadow-xl sm:rounded-lg" onclick="payer('{{ $abonnement_type->price }}', '{{ Auth::user()->lastname }}', '{{ Auth::user()->firstname }}', '{{ Auth::user()->email }}', '{{ Auth::user()->phone }}')">Payer avec Cinetpay</button> --}}
        {{-- <button class="object-right-top my-3 mx-5 py-2 px-4 text-white bg-orange-600  font-semibold shadow-xl sm:rounded-lg" onclick="route('catalogue.abonnement.payement')">Payer</button> --}}
        <button class="object-right-top my-3 mx-5 py-2 px-10 text-white bg-orange-600  font-semibold shadow-xl sm:rounded-lg" wire:click="buyAbonnement">Payer</button>
    </div>
    


</div>



@script
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

@endscript


{{-- @script
    <script>
        $wire.on('test', () => {
            console.log('test: ');
            // console.log('test: ' + event.detail.test);
            // $wire.$refresh()
            // selectPeriod(event.detail.duration);
        });
        // function selectPeriod(period){
        //     console.log('CLick wire ' + period);
            
        //     var m1 = document.getElementById("1mois");
        //     var m2 = document.getElementById("3mois");
        //     var m3 = document.getElementById("6mois");
        //     var m4 = document.getElementById("12mois");

        //     switch (period) {
        //         case 1:
        //             m1.classList.add("border-orange-600");
        //             m2.classList.remove("border-orange-600");
        //             m3.classList.remove("border-orange-600");
        //             m4.classList.remove("border-orange-600");
        //             break;
        //         case 3:
        //             m1.classList.remove("border-orange-600");
        //             m2.classList.add("border-orange-600");
        //             m3.classList.remove("border-orange-600");
        //             m4.classList.remove("border-orange-600");
        //             break;
        //         case 6:
        //             m1.classList.remove("border-orange-600");
        //             m2.classList.remove("border-orange-600");
        //             m3.classList.add("border-orange-600");
        //             m4.classList.remove("border-orange-600");
        //             break;
        //         case 12:
        //             m1.classList.remove("border-orange-600");
        //             m2.classList.remove("border-orange-600");
        //             m3.classList.remove("border-orange-600");
        //             m4.classList.add("border-orange-600");
        //             break;
            
        //         default:
        //             break;
        //     }
        //     // $wire.$refresh();
        // }

        // $wire.$on('new-duration', (event) => {
        //     consol.log('duration: ');
        //     // $wire.$refresh()
        //     selectPeriod(event.detail.duration);
        // });
    </script>
@endscript --}}

@script
<script>
    let m1 = document.getElementById("m1");
    let m2 = document.getElementById("m3");
    let m3 = document.getElementById("m6");
    let m4 = document.getElementById("m12");
    $wire.on('duration', (event) => {
        console.log(' Spec error trigger alert ' + event.duration);
        console.log(event);
        selectPeriod(event.duration, event.old);
    });
    
    function selectPeriod(period, old){
        // console.log('CLick wire ' + period);
        console.log(period);

        console.log(old);

        switch (old) {
            case 1:
                m1.classList.remove("bg-orange-300");
                break;
            case 3:
                m3.classList.remove("bg-orange-300");
                break;
            case 6:
                m6.classList.remove("bg-orange-300");
                break;
            case 12:
                m12.classList.remove("bg-orange-300");
                break;
        
        }
        switch (period) {
            case 1:
                m1.classList.add("bg-orange-300");
                break;
            case 3:
                m3.classList.add("bg-orange-300");
                break;
            case 6:
                m6.classList.add("bg-orange-300");
                break;
            case 12:
                m12.classList.add("bg-orange-300");
                break;
        
        }

    }
</script>
@endscript

@script
<script>
    $wire.on('error_promo', (event) => {
        console.log(event);
        alert(event);
    });
</script>
@endscript