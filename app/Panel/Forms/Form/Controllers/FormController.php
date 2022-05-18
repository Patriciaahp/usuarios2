<?php

namespace App\Panel\Forms\Form\Controllers;

use App\Panel\Forms\Forms\Requests\FormStoreRequest;
use App\Panel\Forms\Forms\Requests\FormUpdateRequest;
use App\Panel\Shared\Controllers\Controller;
use Domain\Forms\Forms\Actions\DeleteFormAction;
use Domain\Forms\Forms\Actions\StoreFormAction;
use Domain\Forms\Forms\Actions\UpdateFormAction;
use Domain\Forms\Models\Form;
use Domain\Forms\Models\FormQuestion;
use function redirect;
use function view;

class FormController extends Controller
{

    public function create()
    {
        return $this->form('forms/create', new Form());
    }

    protected function form($view, Form $form)
    {
        return view($view, [
            'form' => $form,
        ]);
    }

    public function update(FormUpdateRequest $request, $id)
    {
        $form = Form::findById($id);

        $validated = $request->validated();
        $data = [
            'name' => $validated['name'],
            'title' => $validated['title'],
            'description' => $validated['description'],

        ];

        $action = new UpdateFormAction($form, $data);
        $result = $action->execute();

        $form = $result->object;
        return redirect()->route('forms', $form);
    }

    public function store(FormStoreRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'name' => $validated['name'],
            'title' => $validated['title'],
            'description' => $validated['description']
        ];
        $action = new StoreFormAction($data);
        $result = $action->execute();

        $form = $result->object;
        return redirect()->route('forms');
    }

    public function delete($id)
    {
        $form = Form::findById($id);
        $action = new DeleteFormAction($form);
        $result = $action->execute($form);

        $form = $result->object;
        return redirect()->route('forms');
    }

    public function edit($id)
    {
        $form = Form::findById($id);
        return view('forms/update', ['form' => $form]);
    }

    public function preview($id)
    {
        $form = Form::findById($id);

        $questions = FormQuestion::all()
            ->where('form_id', '=', $id)
            ->sortBy('order_');

        return view('forms/preview', ['form' => $form,
            'questions' => $questions]);
    }

    public function view($id)
    {
        $form = Form::findById($id);

        $questions = FormQuestion::all()
            ->where('form_id', '=', $id)
            ->sortBy('order_');

        return view('forms/view', ['form' => $form,
            'questions' => $questions]);
    }

    public function show($id)
    {
        $form = Form::findById($id);
        return view('forms/show', ['form' => $form]);
    }

    public function question($id)
    {
        $questions = FormQuestion::all()
            ->where('form_id', '=', $id)
            ->sortBy('order_');

        $form = Form::findById($id);


        return view('forms/questions', ['form' => $form,
            'questions' => $questions]);
    }

}
