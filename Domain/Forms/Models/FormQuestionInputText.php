<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormQuestionInputText extends FormQuestion
{
    use HasFactory;

    protected $label;
    protected $placeholder;
    protected $required;
    protected $order_;
    protected $help_text;

    public function formQuestion()
    {
        return $this->belongsTo(FormQuestion::class);

    }

}
