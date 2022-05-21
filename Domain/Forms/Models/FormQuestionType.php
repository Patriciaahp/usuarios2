<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormQuestionType extends Model
{
    use HasFactory;

    protected $label;
    protected $placeholder;
    protected $required;
    protected $order_;
    protected $help_text;
    protected $guarded = [];

    public function formQuestion()
    {
        return $this->belongsTo(FormQuestion::class);
    }
}
