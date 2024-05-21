<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class InteriorForm extends Form
{
    
    
    public $interiorsable_id;
    public $interiorsable_type;

    public $nombre_piece;

    public $nombre_salle_eau ;

    public $superficie;

    public $volume ;

    public $etage ;

    public $nombre_etage ;
    
    public $basement = false;

    public $nombre_etage_basement ;

    public $salle_de_conf = false;

    public $nombre_salle_de_conf;

    public $open_space = false;

    public $numero_de_porte;

    public $suite = false;

    
}
