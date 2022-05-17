<?php

namespace App\Form\FormSessions\Controllers;

use App\Http\Controllers\Controller;
use Domain\Forms\FormSessions\Actions\StoreFormSessionAction;
use Domain\Forms\Models\Form;
use Domain\Forms\Models\FormQuestion;
use Domain\Forms\Models\FormSession;

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
            ->where('form_id', '=', $form->id);
        return view('sessions/form',
            [
                'session' => $session,
                'form' => $form,
                'questions' => $questions
            ]);
    }
}
