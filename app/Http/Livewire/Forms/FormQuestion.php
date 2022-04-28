<?php

namespace App\Http\Livewire\Forms;

use App\Models\FormQuestionType;
use Livewire\Component;
use function view;

class FormQuestion extends Component
{


    public function render()
    {
        $types = FormQuestionType::all();
        return view('livewire.form-question',
            [
                'types' => $types,
            ]);
    }
}
