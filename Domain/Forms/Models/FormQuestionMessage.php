<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormQuestionMessage extends FormQuestion
{
    use HasFactory;

    protected $help_text;
    protected $order_;


}
