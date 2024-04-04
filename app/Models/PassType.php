<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class PassType extends Model
{
    use HasFactory;
    
    
    public function passes(): HasMany
    {
        return $this->hasMany(Pass::class);
    }

    public function promotions(): MorphMany
    {
        return $this->morphMany(Promotions::class, 'promotionnable');
    }
}
