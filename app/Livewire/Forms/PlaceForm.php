<?php

namespace App\Livewire\Forms;

use App\Models\Place;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PlaceForm extends Form
{
    // Formulaire for the place 

    #[Validate('required')]
    public $facade_id;
    #[Validate()]
    public $placeable_id;
    #[Validate('required')]
    public $placeable_type;
    #[Validate('required')]
    public $offer_type = '';

    #[Validate('')]
    public $rent_period = '';

    #[Validate('required')]
    public $price = '';

    #[Validate('')]
    public $latitude = '';

    #[Validate('')]
    public $longitude = '';

    #[Validate('')]
    public $proprio_name = '';

    #[Validate('')]
    public $proprio_telephone = '';

    #[Validate('required')]
    public $photo_couverture = '';

    #[Validate('')]
    public $description = '';

    #[Validate('')]
    public $conditions = '';
    
    #[Validate('required')]
    public $commune_id = '';

}
