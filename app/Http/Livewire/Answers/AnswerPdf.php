<?php

namespace App\Http\Livewire\Answers;

use Domain\Forms\Models\Answer;
use Domain\Forms\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class AnswerPdf extends Component
{
    public $form;
    public $answers;

    public function mount($id)
    {
        $this->form = Form::find($id);

        $this->answers = Answer::all()
            ->where('form_id', '=', $id);
    }

    public function render(Request $request)
    {
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("answers/livewire/answersPdf", [
            'form' => $this->form,
            'answers' => $this->answers
        ]);
        return $dompdf->stream();

    }
}
