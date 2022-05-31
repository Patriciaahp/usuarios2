<?php

namespace App\Http\Livewire\Questions;

use Domain\Forms\Models\FormQuestionType;
use function view;

class FormQuestionMessage extends FormQuestionType
{
    protected $label;
    protected $placeholder = null;
    protected $required = false;
    protected $order_;
    protected $help_text;

    public function render()
    {
        return view('questions/livewire.form-question-message');
    }
}
