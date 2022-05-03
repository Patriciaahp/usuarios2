<?php

namespace App\Models;


use App\Filters\QueryFilter;
use App\Providers\FormQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
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

    public function formQuestions()
    {
        return $this->hasMany(FormQuestion::class);
    }

    public function newEloquentBuilder($query)
    {
        return new FormQuery($query);
    }

    public function scopeFilterBy($query, QueryFilter $filters, array $data)
    {
        return $filters->applyto($query, $data);
    }

}
