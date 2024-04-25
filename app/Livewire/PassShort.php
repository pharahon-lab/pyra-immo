<?php

namespace App\Livewire;

use App\Models\Pass;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

class PassShort extends Component
{

    
    public $hasPass;
    public $pass;

    public $pass_code;

    public function mount()
    {
        $this->hasPass = false;
        $passe = Session('pass');
        if($passe){
            $this->pass = $passe;
            $this->hasPass = true;
            
        }
    }

    public function checkPass()
    {
        $this->pass = Pass::where('code', $this->pass_code)->first();
        if($this->pass){
            $this->hasPass = true;
            Session(['pass' => $this->pass]);
        }
    }

    public function render()
    {
        return view('livewire.pass-short');
    }
}
