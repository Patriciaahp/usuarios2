<?php

namespace App\Http\Livewire\Questions;

use App\Models\Form;
use App\Models\FormQuestionType;
use Illuminate\Http\Request;
use Livewire\Component;
use function view;

class FormQuestionTypeTable extends Component
{

    public function render(Request $request)
    {
        $form_id = $request->get('form_id');
        $form = Form::all()
            ->where('id', '=', $form_id);


        $types = FormQuestionType::all();
        return view('questions/livewire.form-question-type', [
            'types' => $types,
            'form' => $form,
            'form_id' => $form_id,


        ]);
    }
}
