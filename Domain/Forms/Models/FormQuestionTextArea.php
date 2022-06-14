<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormQuestionTextArea extends FormQuestion
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $label;
    protected $required;

}