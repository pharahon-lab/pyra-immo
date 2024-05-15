
@php
    $pass = Session('pass');
@endphp

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
        <div class="flex w-full justify-evenly">
            <a  href="{{ route('home.pass.payer', ['pass_type' => $pass_ty]) }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                Payer
            </a>
            @if ($pass)
                <a  href="{{ route('home.pass.payer', ['pass_type' => $pass_ty]) }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Prolonger
                </a>
            @endif
        </div>
    </div>
</div>

