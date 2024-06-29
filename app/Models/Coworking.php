<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramsey\Uuid\Uuid;

class Coworking extends Model
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

    
    
    public function coworkingable(): MorphTo
    {
        return $this->morphTo();
    }

}
