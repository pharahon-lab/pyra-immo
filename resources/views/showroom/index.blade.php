<x-customer-layout>

    <!--Hero-->
    <div class="bg-white border-b text-black font-semibold py-8 mt-24 px-48">
        
        <div class="h-1/2 w-full">
            <div class="flex justify-between m-4">
                <h1 class=" text-xl">category 1</h1>
                <a href="{{ route('showroom.category', ['category' => '1']) }}" class=" text-xl text-orange-600">Voir plus</a>
            </div>
            <div class="grid grid-cols-5 grid-rows-2 gap-2 w-full items-start">
                @foreach ($places as $plac)
                            <div class="mx-1" wire:key="{{ $plac->id }}">
                                @livewire('place-card-customer', ["place"=> $plac, key($plac->id)])
                            </div>
                @endforeach
                    
            </div>
        </div>
    </div>

     {{-- <!--Hero-->
     <section class="bg-white border-b text-black font-semibold py-8 px-48">
        
        <div class="">
            <div class="flex justify-between m-4">
                <h1 class=" text-xl">category 1</h1>
                <a href="{{ route('showroom.category', ['category' => '2']) }}" class=" text-xl text-orange-600">Voir plus</a>
            </div>
            <div class="flex flex-wrap gap-2">
                @foreach ($places as $plac)
                            <div wire:key="{{ $plac->id }}">
                                @livewire('place-card-customer', ["place"=> $plac, key($plac->id)])
                            </div>
                @endforeach
                    
            </div>
        </div>
    </section>
    <!--Hero-->
    <section class="bg-white border-b text-black font-semibold py-8 px-48">
        
        <div class="">
            <div class="flex justify-between m-4">
                <h1 class=" text-xl">category 1</h1>
                <a  href="{{ route('showroom.category', ['category' => '3']) }}" class=" text-xl text-orange-600">Voir plus</a>
            </div>
            <div class="flex flex-wrap gap-2">
                @foreach ($places as $plac)
                            <a wire:key="{{ $plac->id }}">
                                @livewire('place-card-customer', ["place"=> $plac, key($plac->id)])
                            </a>
                @endforeach
                    
            </div>
        </div>
    </section> --}}

</x-customer-layout>