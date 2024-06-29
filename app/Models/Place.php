<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Ramsey\Uuid\Uuid;


class Place extends Model
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

    
    public function fascade(): BelongsTo
    {
        return $this->belongsTo(FascadeImmo::class, 'facade_id');
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
    public function children(): HasMany
    {
        return $this->hasMany(Place::class);
    }

    
    public function placeable(): MorphTo
    {
        return $this->morphTo();
    }
    
    
    
    public function papers(): MorphOne
    {
        return $this->morphOne(LegalPaper::class, 'paperable');
    }
    
    public function interior(): MorphOne
    {
        return $this->morphOne(Interior::class, 'interiorsable');
    }
    
    public function exterior(): MorphOne
    {
        return $this->morphOne(Exterior::class, 'exteriorsable');
    }
    
    public function comodities(): MorphOne
    {
        return $this->morphOne(Comodities::class, 'comoditiesable');
    }

    
    public function commune(): BelongsTo
    {
        return $this->belongsTo(Communes::class);
    }
    public function freeViews(): BelongsTo
    {
        return $this->belongsTo(FreeViews::class);
    }

    
    public function images(): HasMany
    {
        return $this->hasMany(ImmoImages::class);
    }

    public function videos(): HasMany
    {
        return $this->hasMany(ImmoVideo::class);
    }

    public function isfreeViews(): bool
    {
        return $this->freeViews()->whereDate("end_date", '>', today())->count() > 0;
    }

}
