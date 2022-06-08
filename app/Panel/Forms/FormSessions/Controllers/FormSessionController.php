<?php

namespace App\Panel\Forms\FormSessions\Controllers;

use App\Mail\SendFormEmail;
use App\Panel\Shared\Controllers\Controller;
use Domain\Forms\Answer\Actions\StoreAnswerAction;
use Domain\Forms\FormSession\Actions\StoreFormSessionAction;
use Domain\Forms\FormSession\Actions\UpdateFormSessionCompletedAction;
use Domain\Forms\FormSession\Actions\UpdateFormSessionFinishedAtAction;
use Domain\Forms\FormSession\Actions\UpdateFormSessionStartedAtAction;
use Domain\Forms\Models\Answer;
use Domain\Forms\Models\Form;
use Domain\Forms\Models\FormQuestion;
use Domain\Forms\Models\FormSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function sendEmail($id, $hash)
    {
        $form = Form::find($id);
        $session = FormSession::where('hash', $hash)->first();

        return view('sessions/email', ['form' => $form, 'session' => $session]);

    }

    public function email(Request $request, $id, $hash)
    {
        $email = $request['email'];

        $form = Form::find($id);
        $session = FormSession::where('hash', $hash)->first();

        Mail::to($email)->send(new SendFormEmail($form, $session));
        return redirect()->route('send', ['id' => $id]);
    }

    public function createAnswer(Request $request, $id, $hash)
    {
        $session = FormSession::where('hash', $hash)->first();
        $questions = FormQuestion::where('form_id', $id)
            ->where('type_id', 1)
            ->orwhere('type_id', 3)
            ->orwhere('type_id', 4)
            ->get();
        foreach ($questions as $key => $question) {
            $answer = new Answer();
            $data = [
                'label' => $request['label' . $question->id],
                'answer' => $request['answer' . $question->id],
                'session_id' => $request['session_id'],
                'formulary_question_id' => $request['formulary_question_id_' . $question->id],
                'form_id' => $request['form_id'],
            ];

            $action = new StoreAnswerAction($data);
            $result = $action->execute();
            $answer = $result->object;

            $data2 = [
                'finished_at' => date('Y-m-d H:i:s')
            ];
            $action2 = new UpdateFormSessionFinishedAtAction($session, $data2);
            $result2 = $action2->execute();

            $data3 = [
                'completed' => true
            ];
            $action3 = new UpdateFormSessionCompletedAction($session, $data3);
            $result3 = $action3->execute();

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

        $data2 = [
            'started_at' => date('Y-m-d H:i:s')
        ];
        $action2 = new UpdateFormSessionStartedAtAction($session, $data2);
        $result2 = $action2->execute();

        if ($session->completed === 0) {
            return view('sessions/form',
                [
                    'session_id' => $session->id,
                    'form_id' => $form->id,
                    'session' => $session,
                    'form' => $form,
                    'questions' => $questions,

                ]);
        } else {
            return view('sessions/principal');
        }
    }
}
