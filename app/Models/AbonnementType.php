<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class AbonnementType extends Model
{
    use HasFactory;

    
    public function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class);
    }

    public function promotions(): MorphMany
    {
        return $this->morphMany(Promotions::class, 'promotionnable');
    }

    /**
 * Get the active promotion without code.
 */
    public function promo_general(): MorphOne
    {
        return $this->morphOne(Promotions::class, 'promotionnable')->where('use_code', false)->whereDate('start', '<', today())->whereDate('end', '>', today());
    }
}
