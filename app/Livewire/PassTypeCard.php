<?php

namespace App\Livewire;

use App\Models\PassType;
use Livewire\Component;

class PassTypeCard extends Component
{
    public $pass_ty;
    
    public function mount(PassType $passType){
        $this->pass_ty = $passType;
    }

    public function render()
    {
        return view('livewire.pass-type-card');
    }
}
