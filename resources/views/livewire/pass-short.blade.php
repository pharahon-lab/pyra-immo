<div>
    @if ($hasPass)
        <div class="flex justify-center">
            
            <img src="{{ asset('images/pass_b.svg') }}" class="size-5 my-auto">
            <a class="text-black text-xl mx-2 px-4 font-bold rounded-full" href="{{ route('home.pass.index') }}">Visites restantes : {{ $pass->nb_visite }}</a>
            <a class="bg-white text-lg mx-2 px-4 font-bold rounded-full shadow-lg" href="{{ route('home.pass.index') }}">Prolonger</a>
        </div>
    @else
        <form wire:submit="checkPass">
            @csrf

            <div class="flex justify-center">
                <input class="mx-4 rounded-full" type="text" name="pass_code"  wire:model="pass_code">
                <button class="bg-white mx-2 px-4 font-bold rounded-full shadow-lg" type="submit"> Verifier </button>
            </div>
        </form>
        
    @endif
</div>
