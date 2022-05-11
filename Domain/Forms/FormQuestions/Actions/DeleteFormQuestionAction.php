<?php

namespace Domain\Forms\FormQuestions\Actions;

use Domain\Forms\FormQuestions\ResponseCodes\ResponseCodeFormQuestionDeleted;
use Domain\Forms\Models\FormQuestion;

class DeleteFormQuestionAction
{

    private $question;

    public function __construct(FormQuestion $question)
    {
        $this->question = $question;
    }

    public function execute()
    {
        $this->question->forceDelete();
        return new ResponseCodeFormQuestionDeleted();
    }

}
