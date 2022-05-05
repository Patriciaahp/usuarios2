<?php

namespace Domain\FormQuestions\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormQuestionDeleted extends ActionResponseCode
{
    function __construct()
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'Form question deleted',
        );
    }

}

