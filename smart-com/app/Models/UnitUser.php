<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UnitUser extends Pivot
{
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function unit(): BelongsTo{
        return $this->belongsTo(Unit::class);
    }
}
