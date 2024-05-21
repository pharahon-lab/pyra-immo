<?php

namespace App\Livewire\Forms;

use App\Models\Place;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PlaceForm extends Form
{
    // Formulaire for the place 

    public $facade_id;
    public $placeable_id;
    public $placeable_type;
    public $offer_type = '';

    public $rent_period = '';

    public $price = '';

    public $latitude = '';

    public $longitude = '';

    public $proprio_name = '';

    public $proprio_telephone = '';

    public $photo_couverture = '';

    public $description = '';

    public $conditions = '';
    
    public $commune_id = '';

}
