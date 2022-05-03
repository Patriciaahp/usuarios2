<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormQuestion extends Model
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
        'required' => 'bool',
    ];
    /**
     * @var mixed
     */
    protected $required;

    /**
     * @var mixed
     */

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function formQuestionType()
    {
        return $this->hasOne(FormQuestionType::class);
    }

}
