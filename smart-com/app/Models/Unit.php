<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{

    protected $fillable = [
        "name",
        "location"
    ];


    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class)->using(UnitUser::class)->withPivot("user_id");
    }
}
