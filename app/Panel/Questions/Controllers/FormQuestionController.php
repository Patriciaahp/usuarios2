<?php

namespace App\Panel\Questions\Controllers;


use App\Models\Form;
use App\Models\FormQuestion;
use App\Panel\Questions\Requests\FormQuestionRequest;
use App\Panel\Questions\Requests\FormQuestionUpdateRequest;
use App\Panel\Shared\Controller;
use Domain\FormQuestions\Actions\DeleteFormQuestionAction;
use Domain\FormQuestions\Actions\StoreFormQuestionAction;
use Domain\FormQuestions\Actions\UpdateFormQuestionAction;
use Illuminate\Http\Request;
use function redirect;
use function view;


class FormQuestionController extends Controller
{

    public function create(Request $request)
    {
        $type = $request->get('type');

        return redirect()->route('questions.detail'
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
        $question = $result->object;
        $idForm = $question->form_id;

        $form = Form::find($idForm);
        return redirect()->route('questions.detail',
            [
                'id' => $form->id
            ]);
    }

    public function delete($id)
    {

        $question = FormQuestion::find($id);

        $idForm = $question->form_id;

        $form = Form::find($idForm);

        $action = new DeleteFormQuestionAction($question);
        $result = $action->execute($question);

        $question = $result->object;
        return redirect()->route('questions.detail',
            [
                'id' => $form->id]);
    }

    public function edit($id)
    {
        $question = FormQuestion::find($id);
        $idForm = $question->form_id;

        $form = Form::find($idForm);
        return view('questions/update', ['question' => $question,
            'id' => $form->id]);
    }

    public function update(FormQuestionUpdateRequest $request, $id)
    {
        $question = FormQuestion::find($id);
        $idForm = $question->form_id;

        $form = Form::find($idForm);

        $validated = $request->validated();

        $data = [
            'label' => $validated['label'],
            'required' => $validated['required'],
            'order_' => $validated['order_'],
            'placeholder' => $validated['placeholder'] ?? null,
            'help_text' => $validated['helpText'] ?? null,

        ];

        $action = new UpdateFormQuestionAction($question, $data);
        $result = $action->execute();

        $question = $result->object;
        return redirect()->route('questions.detail',
            [
                'id' => $form->id]);
    }

    public function preview($id)
    {
        $question = FormQuestion::find($id);
        $idForm = $question->form_id;

        $form = Form::find($idForm);


        return view('questions/preview', [
            'id' => $form->id,
            'question' => $question

        ]);
    }

}
