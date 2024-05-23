<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        return $this->belongsTo(FascadeImmo::class);
    }

    
    public function placeable(): MorphTo
    {
        return $this->morphTo();
    }

    
    public function commune(): BelongsTo
    {
        return $this->belongsTo(Communes::class);
    }
    public function freeViews(): BelongsTo
    {
        return $this->belongsTo(FreeViews::class);
    }
    public function isfreeViews(): bool
    {
        return $this->freeViews()->whereDate("end_date", '>', today())->count() > 0;
    }

}
