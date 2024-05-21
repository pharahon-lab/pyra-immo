<?php

namespace App\Livewire;

use App\Models\Place;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class HouseCard extends Component
{
    public $place;
    public $path;

    public function mount(Place $place){
        $this->place = $place;
        $this->path = 'https://pyra-immo-bucket-1.s3.eu-west-1.amazonaws.com/'.$this->place->photo_couverture;
    }

    public function render()
    {
        return view('livewire.house-card');
    }
}
