<?php

namespace App\Panel\Forms\FormSessions\Controllers;

use App\Panel\Shared\Controllers\Controller;
use Domain\Forms\Answers\Actions\StoreAnswerAction;
use Domain\Forms\FormSessions\Actions\StoreFormSessionAction;
use Domain\Forms\Models\Answer;
use Domain\Forms\Models\Form;
use Domain\Forms\Models\FormQuestion;
use Domain\Forms\Models\FormSession;
use Illuminate\Http\Request;
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

    public function principal()
    {
        return view('sessions/principal');
    }

    public function createAnswer(Request $request, $id)
    {
        $questions = FormQuestion::where('form_id', $id)
            ->where('type_id', 1)->get();
        foreach ($questions as $key => $question) {
            $answer = new Answer();
            $data = [
                'label' => $request['label'],
                'answer' => $request['answer' . $question->id],
                'session_id' => $request['session_id'],
                'formulary_question_id' => $request['formulary_question_id_' . $question->id],
                'form_id' => $request['form_id'],
            ];

            $action = new StoreAnswerAction($data);
            $result = $action->execute();
            $session = $result->object;
        }
        return redirect()->route('principal');
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
                'session_id' => $session->id,
                'form_id' => $form->id,
                'session' => $session,
                'form' => $form,
                'questions' => $questions,

            ]);
    }
}
