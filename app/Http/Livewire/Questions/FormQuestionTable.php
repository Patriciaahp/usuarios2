<?php

namespace App\Http\Livewire\Questions;


use Domain\Forms\Models\FormQuestion;
use Illuminate\Http\Request;
use Livewire\Component;
use function view;

class FormQuestionTable extends Component
{


    public function render(Request $request)
    {
        $type_id = $request->get('type_id');
        $form_id = $request->get('form_id');


        return view('questions/livewire.form-question',
            [

                'form_id' => $form_id,
                'type_id' => $type_id,
                'question' => new FormQuestion()
            ]);
    }
}
