<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ExteriorForm extends Form
{
    
    
    public $exteriorsable_id;
    public $exteriorsable_type;

    public $piscine = false;
    
    public $piscine_is_interne = false;
    

    public $securite = false;
    

    public $parking = false;
    

    public $place_parking;
    

    public $jardin = false;
    

    public $cours_avant = false;
    

    public $cours_arriere = false;
    

    public $balcon_avant = false;
    

    public $balcon_arriere = false;
    

    public $terrasse_avant = false;

    public $terrasse_arriere = false;
}
