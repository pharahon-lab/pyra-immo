<?php

namespace App\Livewire;

use App\Models\AbonnementType;
use Livewire\Component;

class AbonnementTypeCard extends Component
{
    public $ab_ty;

    public function mount(AbonnementType $abonnementType){
        $this->ab_ty = $abonnementType;
    }

    public function render()
    {
        return view('livewire.abonnement-type-card');
    }
}
