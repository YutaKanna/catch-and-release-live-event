<?php

namespace App;

use App\Event;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isMusician()
    {
        return $this->type == (UserType::getInstance(UserType::Musician))->key;
    }

    /**
     * @return BelongsToMany
     */
    public function musicianGroups(): BelongsToMany
    {
        return $this->belongsToMany(
            MusicianGroup::class,
            'musician_group_musician',
            'user_id',
            'musician_group_id',
        );
    }
}
