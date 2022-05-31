<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SingleChoice extends FormQuestion
{
    use HasFactory;

    protected $label;
    protected $required;
    protected $order_;
    protected $help_text;
}
