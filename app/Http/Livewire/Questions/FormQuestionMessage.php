<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;
use function view;

class FormQuestionMessage extends Component
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
