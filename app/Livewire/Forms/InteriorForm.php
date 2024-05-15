<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class InteriorForm extends Form
{
    
    
    #[Validate()]
    public $interiorsable_id;
    #[Validate('required')]
    public $interiorsable_type;

    #[Validate('')]
    public $nombre_piece;

    #[Validate('')]
    public $nombre_salle_eau ;

    #[Validate('')]
    public $superficie;

    #[Validate('')]
    public $volume ;

    #[Validate('')]
    public $etage ;

    #[Validate('')]
    public $nombre_etage ;
    
    #[Validate('')]
    public $basement = false;

    #[Validate('')]
    public $nombre_etage_basement ;

    #[Validate('')]
    public $salle_de_conf = false;

    #[Validate('')]
    public $nombre_salle_de_conf;

    #[Validate('')]
    public $open_space = false;

    #[Validate('')]
    public $numero_de_porte;

    #[Validate('')]
    public $suite = false;

    
}
