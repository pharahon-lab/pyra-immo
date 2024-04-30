<?php

namespace App\Livewire;

use App\Models\Abonnement;
use Livewire\Component;

class AbonnementBuyCard extends Component
{
    public $abonnement;

    public function mount(Abonnement $abonnement){
        $this->abonnement = $abonnement;
    }

    public function render()
    {
        return view('livewire.abonnement-buy-card');
    }
}
