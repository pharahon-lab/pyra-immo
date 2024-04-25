<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class FascadeImmo extends Model
{
    use HasFactory;
    use HasUuids;

    
    /**
     * Generate a new UUID for the model.
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
    
    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['id'];
    }
    
    public function proprio(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
    public function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class);
    }
    public function latestAbonnement(): HasOne
    {
        return $this->hasOne(Abonnement::class, 'facade_id')->latestOfMany('created_at');
    }

    
    public function places(): HasMany
    {
        return $this->hasMany(Place::class, 'facade_id');
    }

    // get the places that are on free view
    public function freeViewPlaces(): HasMany
    {
        return $this->hasMany(Place::class, 'facade_id');
    }
    // get the places that are on free view
    public function countPlaces(): int
    {
        return $this->hasMany(Place::class, 'facade_id')->count();
    }


}
