<?php

namespace Domain\Forms\FormQuestion\Actions;

use Domain\Forms\FormQuestion\ResponseCodes\ResponseCodeFormQuestionDeleted;
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
