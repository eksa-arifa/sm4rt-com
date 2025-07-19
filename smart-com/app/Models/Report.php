<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $fillable = [
        "description",
        "location",
        "photo",
        "user_id",
        "category_id",
        "status"
    ];


    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
