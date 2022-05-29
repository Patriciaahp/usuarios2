<?php

namespace App\Panel\Answers\Controllers;

use App\Panel\Shared\Controllers\Controller;
use Domain\Forms\Models\Answer;
use Domain\Forms\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AnswerPdfController extends Controller
{
    public $form;
    public $answers;
    public $question;

    public function answerPdf(Request $request, $id)
    {
        $this->form = Form::find($id);

        $this->answers = Answer::all()
            ->where('form_id', '=', $id);

        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("answers/livewire/answersPdf", [
            'form' => $this->form,
            'answers' => $this->answers
        ]);
        return $dompdf->stream();

    }
}
