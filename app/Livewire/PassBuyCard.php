<?php

namespace App\Livewire;

use App\Models\Pass;
use App\Models\PassType;
use App\Services\PassServices;
use App\Services\TransactionServices;
use Livewire\Component;

class PassBuyCard extends Component
{
    public $pass_type;

    public function mount(PassType $pass){
        $this->pass_type = $pass;
    }

    

    public function render()
    {
        return view('livewire.pass-buy-card', ['pass_type' => $this->pass_type]);
    }

    
    public function buyPass(PassServices $passService, TransactionServices $transactionService)
    {
        
        $transaction = $transactionService->freeTrannsaction();

        $pass = $passService->new_pass($this->pass_type, $transaction);
        return redirect()->route('home.pass.payement', ['pass_id' => $pass->id]);
    }

}
