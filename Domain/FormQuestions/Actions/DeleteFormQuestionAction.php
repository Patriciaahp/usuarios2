<?php

namespace Domain\FormQuestions\Actions;

use App\Models\FormQuestion;
use Domain\FormQuestions\ResponseCodes\ResponseCodeFormQuestionDeleted;

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
