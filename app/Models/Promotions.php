<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Promotions extends Model
{
    use HasFactory;

    public function promotionnable(): MorphTo
    {
        return $this->morphTo();
    }
}
