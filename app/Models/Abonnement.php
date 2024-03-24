<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class Abonnement extends Model
{
    use HasFactory;
    
    use HasUuids;

     
    protected $keyType = 'string';

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

    public function fascadeImmo(): BelongsTo
    {
        return $this->belongsTo(FascadeImmo::class);
    }

    public function abonnement_type(): BelongsTo
    {
        return $this->belongsTo(AbonnementType::class);
    }
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transactions::class);
    }

}
