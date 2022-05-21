<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormQuestionMessage extends FormQuestion
{
    use HasFactory;

    protected $label;
    protected $placeholder = false;
    protected $required = false;
    protected $order_;
    protected $help_text;
}
