<?php

namespace App\Panel\Forms\Controllers;


use App\Http\Requests\FormQuestionRequest;
use App\Models\FormQuestion;
use App\Panel\Shared\Controller;
use Domain\FormQuestions\Actions\StoreFormQuestionAction;
use Illuminate\Http\Request;


class FormQuestionController extends Controller
{

    public function create(Request $request)
    {
        $type = $request->get('type');

        return view('forms/createQuestion'
            , [
                'type' => $type,
                'form' => new FormQuestion()
            ]);
    }

    public function store(FormQuestionRequest $request)
    {

        $validated = $request->validated();

        $data = [
            'label' => $validated['label'],
            'required' => $validated['required'],
            'order_' => $validated['order_'],
            'placeholder' => $validated['placeholder'] ?? null,
            'help_text' => $validated['helpText'] ?? null,
            'type_id' => $validated['type_id'],
            'form_id' => $validated['form_id'],

        ];
        $action = new StoreFormQuestionAction($data);
        $result = $action->execute();
        $form = $result->object;
        return redirect()->route('forms');
    }

}
