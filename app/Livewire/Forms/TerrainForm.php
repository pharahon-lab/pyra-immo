<?php

namespace App\Livewire\Forms;

use App\Models\Terrain;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TerrainForm extends Form
{
    public ?Terrain $terrain;
}
