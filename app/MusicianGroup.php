<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MusicianGroup extends Model
{
    protected $table = 'musician_groups';

    /**
     * @return BelongsToMany
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(
            Event::class,
            'event_musician_group',
            'musician_group_id',
            'event_id',
        );
    }
}
