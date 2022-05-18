<?php

namespace App\Panel\Forms\FormSessions\Controllers;

use App\Panel\Shared\Controllers\Controller;
use Domain\Forms\FormSessions\Actions\StoreFormSessionAction;
use Domain\Forms\Models\Form;
use Domain\Forms\Models\FormQuestion;
use Domain\Forms\Models\FormSession;
use function redirect;
use function view;

class FormSessionController extends Controller
{
    public function create($id)
    {
        $data = [

            'form_id' => $id,

        ];
        $action = new StoreFormSessionAction($data);
        $result = $action->execute();
        $session = $result->object;


        $form = Form::find($id);
        return redirect()->route('forms',
            [
                'id' => $form->id
            ]);

    }

    public function send($id)
    {
        $form = Form::find($id);
        $sessions = FormSession::all()
            ->where('form_id', '=', $id);
        $questions = FormQuestion::all()
            ->where('form_id', '=', $id);
        return view('sessions/send',
            [
                'questions' => $questions,
                'form' => $form,
                'sessions' => $sessions
            ]);
    }

    public function form($id, $hash)
    {
        $session = FormSession::all()
            ->where('hash', '=', $hash)
            ->first();
        $form = Form::all()
            ->where('id', '=', $id)
            ->first();
        $questions = FormQuestion::all()
            ->where('form_id', '=', $form->id)
            ->sortBy('order_');
        return view('sessions/form',
            [
                'session' => $session,
                'form' => $form,
                'questions' => $questions
            ]);
    }
}
