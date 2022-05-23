<?php

namespace App\Http\Livewire\Answers;

use Domain\Forms\Models\Answer;
use Domain\Forms\Models\Form;
use Livewire\Component;
use function view;

class Answers extends Component
{
    public $form;
    public $answers;

    public function mount($id)
    {
        $this->form = Form::find($id);

        $this->answers = Answer::all()
            ->where('form_id', '=', $id);
    }

    public function render()
    {
        return view('answers.livewire.answers');
    }
}
