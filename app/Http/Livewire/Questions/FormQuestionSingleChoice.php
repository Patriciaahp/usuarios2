<?php

namespace App\Http\Livewire\Questions;

use Domain\Forms\Models\FormQuestionType;

class FormQuestionSingleChoice extends FormQuestionType
{
    protected $label;
    protected $required;
    protected $order_;
    protected $help_text;

    public function render()
    {
        return view('questions/livewire.form-question-single-choice');
    }
}
