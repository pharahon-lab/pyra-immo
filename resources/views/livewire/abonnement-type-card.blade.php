
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
