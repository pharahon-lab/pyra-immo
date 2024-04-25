<div>
    @if ($hasPass)
        <div class="flex justify-center">
            <a class="text-black text-xl mx-2 px-4 font-bold rounded-full" href="#">Visites restantes : {{ $pass->nb_visite }}</a>
            <a class="bg-white text-lg mx-2 px-4 font-bold rounded-full shadow-lg" href="#">Prolonger</a>
        </div>
    @else
        <form action="" method="post">
            <div class="flex justify-center">
                <input class="mx-4 rounded-full" type="text" name="pass_code" id="pass_code">
                <input class="bg-white mx-2 px-4 font-bold rounded-full shadow-lg" type="submit" value="Verifier">
            </div>
        </form>
        
    @endif
</div>
