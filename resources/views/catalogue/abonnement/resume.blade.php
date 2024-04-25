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


    @php        
        $tt = '1';

    @endphp

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-80 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('abonnement-payement', ['ab_type' => $abonnement_type->id])
                <div class="sdk">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>