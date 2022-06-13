<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormQuestionInputText extends FormQuestion
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_questions';
    protected $label;
    protected $placeholder;
    protected $required;

}
