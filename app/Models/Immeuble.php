<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Ramsey\Uuid\Uuid;

class Immeuble extends Model
{
    use HasFactory;    
    use HasUuids;


    

    public $incrementing = false;
    
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

    
    public function place(): MorphOne
    {
        return $this->morphOne(Place::class, 'placeable');
    }
    
    public function appartements(): MorphMany
    {
        return $this->morphMany(Appartement::class, 'appartementable');
    }
    
    public function studios(): MorphMany
    {
        return $this->morphMany(Studio::class, 'studioable');
    }
    
    public function chambres(): MorphMany
    {
        return $this->morphMany(Chambre::class, 'chambreable');
    }
    
    public function bureaux(): MorphMany
    {
        return $this->morphMany(Bureau::class, 'bureauable');
    }
    
    public function entrepots(): MorphMany
    {
        return $this->morphMany(Entrepot::class, 'entrepotable');
    }
    
    public function coworkings(): MorphMany
    {
        return $this->morphMany(Coworking::class, 'coworkingable');
    }
    
    public function Magasins(): MorphMany
    {
        return $this->morphMany(Magasin::class, 'magasinable');
    }
}
