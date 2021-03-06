<?php

namespace App\Http\Livewire\Questions;

use Domain\Forms\Models\FormQuestionType;
use function view;

class FormQuestionInputText extends FormQuestionType
{
    protected $label;
    protected $placeholder;
    protected $required;
    protected $order_;
    protected $help_text;

    public function render()
    {
        return view('questions/livewire.form-question-input-text');
    }
}
