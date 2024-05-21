<a  href="{{ route('catalogue.places.show', ['house_id' => $place->id]) }}" class="flex flex-col m-2 justify-between rounded-md shadow-lg aspect-square size-60 bg-white cursor-pointer">
    <img class="object-fill rounded-t-md" src="{{ $path }}">
    <div class="flex-col">
        <h5 class="text-lg text-center text-orange-600">{{ $place->commune->name }}</h5>
    </div>
</a>
