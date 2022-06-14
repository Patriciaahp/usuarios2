<?php

namespace App\Http\Livewire\Forms;

use Domain\Forms\FormQuestion\Actions\DeleteOptionAction;
use Domain\Forms\FormQuestion\Actions\StoreOptionsAction;
use Domain\Forms\Models\FormQuestion;
use Livewire\Component;
use function view;

class Option extends Component
{

    public $option;
    public $options;
    public $question_id;
    public $form_id;
    public $question;


    public function submit()
    {
        $validated = $this->validate(
            [
                'option' => 'required',
                'question_id' => 'required'
            ]
        );
        $action = new StoreOptionsAction($validated);
        $result = $action->execute();

        $this->option = $result->object;

        $this->reset('option');
    }

    public function delete($id)
    {
        $this->option = \Domain\Forms\Models\Option::find($id);
        $action = new DeleteOptionAction($this->option);
        $result = $action->execute($this->option);
        $this->reset('option');

    }

    public function mount($id)
    {
        $this->question_id = $id;
        $this->question = FormQuestion::find($id);

        $this->form_id = $this->question->form_id;
    }

    public function render()
    {
        $this->options = \Domain\Forms\Models\Option::all()
            ->where('question_id', $this->question->id);

        return view('questions.livewire.option')
            ->with(['options' => $this->options]);
    }
}
