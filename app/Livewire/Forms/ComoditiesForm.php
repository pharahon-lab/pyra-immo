<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ComoditiesForm extends Form
{
    
    
    #[Validate()]
    public $comoditiesable_id;
    #[Validate()]
    public $comoditiesable_type;

    #[Validate('required')]
    public $meuble = false;
    

    #[Validate('required')]
    public $ascenseur = false;
    

    #[Validate('required')]
    public $gym = false;

    #[Validate('required')]
    public $vestitaire = false;

    #[Validate('required')]
    public $bar = false;

    #[Validate('required')]
    public $boite = false;
    

    #[Validate('required')]
    public $cuisine = false;

    #[Validate('required')]
    public $refrigerateur = false;

    #[Validate('required')]
    public $micro_onde = false;

    #[Validate('required')]
    public $lave_linge = false;

    #[Validate('required')]
    public $boisson = false;

    #[Validate('required')]
    public $nourriture = false;
    

    #[Validate('required')]
    public $chauffe_eau = false;

    #[Validate('required')]
    public $climatisation = false;

    #[Validate('required')]
    public $ventilation = false;
    
    #[Validate('required')]
    public $wifi = false;
    
    #[Validate('required')]
    public $groupe_electrogene = false;
    
    #[Validate('required')]
    public $service_poubelle = false;
    
    #[Validate('required')]
    public $service_menage = false;
    
    #[Validate('required')]
    public $service_linge = false;
}
