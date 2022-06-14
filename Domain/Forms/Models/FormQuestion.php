<?php

namespace Domain\Forms\Models;

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

    protected $table = 'form_questions';

    protected $help_text;
    protected $order_;

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function formQuestionType()
    {
        return $this->hasOne(FormQuestionType::class);
    }

    public function answers()
    {
        return $this->HasMany(Answer::class);
    }

}
