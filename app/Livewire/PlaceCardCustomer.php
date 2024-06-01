<?php

namespace App\Livewire;

use App\Enum\PlaceOfferTypeEnum;
use App\Enum\PlaceRentPeriodEnum;
use App\Models\Place;
use Livewire\Component;

class PlaceCardCustomer extends Component
{
    public $place;
    public $path;
    public $offer_t;
    public $rent_t;
    
    public function mount(Place $place){
        $this->place = $place;
        $this->path = 'https://pyra-immo-bucket-1.s3.eu-west-1.amazonaws.com/'.$this->place->photo_couverture;
        $offer_types = PlaceOfferTypeEnum::cases();
        $rent_types = PlaceRentPeriodEnum::cases();
        $this->rent_t = ''; 
        $this->offer_t = '';
        foreach ($rent_types as  $pt) {
            if($pt->value === $place->rent_period){
                $this->rent_t = $pt->name;
            }
        }
        foreach ($offer_types as $ptk => $pt) {
            if($pt->value == $place->offer_type){
                $this->offer_t = $pt->name;
            }
        }
    }
    public function render()
    {
        return view('livewire.place-card-customer');
    }
}
