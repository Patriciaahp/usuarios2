<?php

namespace App\Http\Livewire\Forms;

use Domain\Forms\FormQuestion\Actions\StoreOptionsAction;
use Livewire\Component;
use function view;

class Option extends Component
{

    public $option;
    public $options;


    public function submit()
    {
        $validated = $this->validate(
            [
                'option' => 'required',
            ]
        );
        $action = new StoreOptionsAction($validated);
        $result = $action->execute();

        $option = $result->object;

        $this->reset('option');
    }


    public function render()
    {
        $this->options = \Domain\Forms\Models\Option::all();

        return view('questions.livewire.option')
            ->with(['options' => $this->options]);
    }
}
