<?php

namespace App\Livewire;

use App\Models\AbonnementType;
use App\Models\User;
use App\Services\AbonnementServices;
use App\Services\TransactionServices;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbonnementPayement extends Component
{
    public $abonnement_type; // Data passed from the controller
    public $duration;

    public function mount($ab_type)
    {
        $this->abonnement_type =  AbonnementType::where('id' , $ab_type)->first();
        $this->duration = 1;
    }

    public function render()
    {
        return view('livewire.abonnement-payement');
    }

    public function checkPromo($promotion_code)
    {
        
    }

    public function timeline($selected)
    {
        $this->dispatch('test', duration : 'test');
        $message = 'tsettesete';
        print($message);
        flush();
        ob_flush();
        $this->duration = $selected;
        $this->dispatch('duration', duration : $this->duration);
    }
    
    public function buyAbonnement(AbonnementServices $abonnementService, TransactionServices $transactionService)
    {
        $user = User::where('id' , Auth::id())->first();
        $abonnementService->newAbonnement($user, $this->abonnement_type, $transactionService->freeTrannsaction(), false);
        return redirect()->route('catalogue.abonnement.index');
    }
}
