<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ExteriorForm extends Form
{
    
    
    #[Validate()]
    public $exteriorsable_id;
    #[Validate()]
    public $exteriorsable_type;

    #[Validate('required')]
    public $piscine = false;
    
    #[Validate('required')]
    public $piscine_is_interne = false;
    

    #[Validate('required')]
    public $securite = false;
    

    #[Validate('required')]
    public $parking = false;
    

    #[Validate('')]
    public $place_parking;
    

    #[Validate('required')]
    public $jardin = false;
    

    #[Validate('required')]
    public $cours_avant = false;
    

    #[Validate('required')]
    public $cours_arriere = false;
    

    #[Validate('required')]
    public $balcon_avant = false;
    

    #[Validate('required')]
    public $balcon_arriere = false;
    

    #[Validate('required')]
    public $terrasse_avant = false;

    #[Validate('required')]
    public $terrasse_arriere = false;
}
