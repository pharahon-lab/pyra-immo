<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitesDone extends Model
{
    use HasFactory;
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
    public function pass(): BelongsTo
    {
        return $this->belongsTo(Pass::class);
    }
}
