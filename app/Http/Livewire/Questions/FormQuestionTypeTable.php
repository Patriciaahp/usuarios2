<?php

namespace App\Http\Livewire\Questions;

use Domain\Forms\Models\Form;
use Domain\Forms\Models\FormQuestionType;
use Illuminate\Http\Request;
use Livewire\Component;
use function view;

class FormQuestionTypeTable extends Component
{
    protected $label;
    protected $placeholder;
    protected $required;
    protected $order_;
    protected $help_text;

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
