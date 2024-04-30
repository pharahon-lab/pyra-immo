<?php

namespace App\Livewire;

use App\Models\AbonnementType;
use App\Models\Promotions;
use App\Models\User;
use App\Services\AbonnementServices;
use App\Services\TransactionServices;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AbonnementPayement extends Component
{
    public $abonnement_type; // Data passed from the controller
    public $duration;
    public $price_base;
    public $price;
    public $promotion_code;
    public $promotion;

    public function mount($ab_type)
    {
        $this->abonnement_type =  AbonnementType::where('id' , $ab_type)->first();
        $this->price = $this->abonnement_type->price;
        $this->price_base = $this->abonnement_type->price;
        $this->duration = 1;
    }

    public function render()
    {
        return view('livewire.abonnement-payement');
    }

    public function checkPromo()
    {
        $promo =  Promotions::where('promo_code' , $this->promotion_code)->first();
        if ($promo) {
            $today = today();
            /// check the date validity on : start ; end
            if ($today->isAfter($promo->start) and $today->isBefore($promo->end)) {
                
                /// if valide check if it has limit on : has_limit
                if ($promo->has_limit) {
                    
                    /// if limit check if limit is < usage_count
                    if ($promo->usage_count < $promo->limit) {
                        $this->promotion = $promo;
                        if ($this->promotion->use_percentage) {
                            $this->price = ($this->price_base / 100) * (100 - $this->promotion->reduction);
                        } else {
                            $this->price = ($this->price_base - $this->promotion->reduction);
                        }
                        
                    } else {
                        $this->alertError('utilisation max atteinte');
                    }
                    

                } else {
                    /// if it has no limit check if used on is_used
                    if ($promo->lis_used) {
                        $this->alertError('promotion déja utilisé');
                    } else {
                        $this->promotion = $promo;
                    }
                }
                
            } else {
                $this->alertError('promotion expiré');
            }
        } else {
            $this->alertError('Code érroné');
        }
        
    }

    public function timeline($selected)
    { 
        $old = $this->duration;
        $this->duration = $selected;
        switch ($this->duration) {
            case 1:
                $this->price_base = ($this->abonnement_type->price * $this->duration); 
                break;
            case 3:
                $this->price_base = ($this->abonnement_type->price * $this->duration) *0.95; 
                break;
            case 6:
                $this->price_base = ($this->abonnement_type->price * $this->duration) *0.90; 
                break;
            case 12:
                $this->price_base = ($this->abonnement_type->price * $this->duration)*0.85; 
                break;
        }
        $this->price = $this->price_base;
        $this->dispatch('duration', duration : $this->duration, old : $old);
    }
    
    public function buyAbonnement(AbonnementServices $abonnementService, TransactionServices $transactionService)
    {
        $user = User::where('id' , Auth::id())->first();
        $abonnementService->newAbonnement($user, $this->abonnement_type, $transactionService->freeTrannsaction(), false, $this->duration);
        return redirect()->route('catalogue.abonnement.index');
    }

    

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertSuccess($message)
    {
        $this->dispatch('suucess', $message);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertError($message)
    {
        $this->dispatch('error', $message);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertInfo($message)
    {
        $this->dispatchBrowserEvent('info', $message);
    }


}
