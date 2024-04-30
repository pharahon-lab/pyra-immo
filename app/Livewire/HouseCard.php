<?php

namespace App\Livewire;

use App\Models\Place;
use Livewire\Component;

class HouseCard extends Component
{
    public $place;

    public function mount(Place $place){
        $this->place = $place;
    }

    public function render()
    {
        return view('livewire.house-card');
    }
}
