<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
