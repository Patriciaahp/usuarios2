<?php

namespace Domain\Forms\Answers\Actions;

use Domain\Forms\Answers\ResponseCodes\ResponseCodeAnswerStored;
use Domain\Forms\Models\Answer;
use Illuminate\Support\Str;

class StoreAnswerAction
{

    private $answer;
    private $form_id;
    private $session_id;
    private $formulary_question_id;
    private $label;
    private $respond;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->label = Str::random(5);
        $this->answer = isset($data['answer']) ? $data['answer'] : 'not answered';
        $this->session_id = isset($data['session_id']) ? $data['session_id'] : null;
        $this->formulary_question_id = isset($data['formulary_question_id']) ? $data['formulary_question_id'] : null;
        $this->form_id = isset($data['form_id']) ? $data['form_id'] : null;
    }


    public function execute()
    {

        $this->respond = Answer::create([
            'label' => $this->label,
            'answer' => $this->answer,
            'session_id' => $this->session_id,
            'formulary_question_id' => $this->formulary_question_id,
            'form_id' => $this->form_id,

        ]);

        return new ResponseCodeAnswerStored($this->respond);
    }
}
