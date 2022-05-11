<?php

namespace Domain\Users\Models;

use App\Filters\QueryFilter;
use App\UserQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'active' => 'bool',
    ];
    /**
     * @var mixed
     */
    protected $active;

    /**
     * @var mixed
     */


    public function newEloquentBuilder($query)
    {
        return new UserQuery($query);
    }

    public function scopeFilterBy($query, QueryFilter $filters, array $data)
    {
        return $filters->applyto($query, $data);
    }

}
