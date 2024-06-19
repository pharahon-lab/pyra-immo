<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;


class Pass extends Model
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

    
    public function pass_type(): BelongsTo
    {
        return $this->belongsTo(PassType::class);
    }
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transactions::class);
    }
    public function visiteEffectue()
    {
        return $this->belongsToMany(VisitesDone::class, 'place_id');
    }
}
