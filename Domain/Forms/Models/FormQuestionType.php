<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormQuestionType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function formQuestion()
    {
        return $this->belongsTo(FormQuestion::class);
    }
}
