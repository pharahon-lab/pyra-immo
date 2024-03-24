<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbonnementType extends Model
{
    use HasFactory;

    
    public function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class);
    }
}
