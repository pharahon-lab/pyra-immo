<?php

namespace App\Livewire;

use App\Enum\PlaceOfferTypeEnum;
use App\Enum\PlaceRentPeriodEnum;
use App\Enum\PlaceTypeEnum;
use App\Models\ImmoImages;
use App\Models\ImmoVideo;
use App\Models\Place;
use Livewire\Component;

class ShowPlaceCustomer extends Component
{
    
    public Place $place;
    public $photos ;
    public $videos;
    public $videoSelectedIndex = 0;
    public $photoSelectedIndex = 0;
    public $is_image_selected = true ;
    public $path = 'https://pyra-immo-bucket-1.s3.eu-west-1.amazonaws.com/';
    
    public $placeTypes;
    public $placeOfferTypes;
    public $placeRentPeriodTypes;

    
    public $placeTypek;
    public $placeOfferTypek;
    public $placeRentPeriodTypek;

    public function mount($place)
    {
        $this->place = $place;

        $this->photos =  ImmoImages::where('place_id', $place->id)->get();
        $this->videos =  ImmoVideo::where('place_id', $place->id)->get();
        $this->placeTypes = PlaceTypeEnum::cases();
        foreach ($this->placeTypes as  $pt) {
            if($pt->value === $place->placeable_type){
                $this->placeTypek = $pt->name;
            }
        }
        $this->placeOfferTypes = PlaceOfferTypeEnum::cases();
        foreach ($this->placeOfferTypes as $ptk => $pt) {
            if($pt->value == $place->offer_type){
                $this->placeOfferTypek = $pt->name;
            }
        }
        $this->placeRentPeriodTypes = PlaceRentPeriodEnum::cases();
        foreach ($this->placeRentPeriodTypes as $ptk => $pt) {
            if($pt->value == $place->placeable_type){
                $this->placeRentPeriodTypek = $pt->name;
            }
        }

        
    }
    
    public function selectPhoto($index){
        $this->photoSelectedIndex = (int) $index;
        $this->is_image_selected = true ;
    }

    public function selectVideo($index){
        $this->videoSelectedIndex =  (int) $index;
        $this->is_image_selected = false ;
    }
    
    public function render()
    {
        return view('livewire.show-place-customer');
    }
}
