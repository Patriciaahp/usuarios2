<?php

namespace Domain\Forms\FormQuestion\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormQuestionUpdated extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'Form question updated',
            $object
        );
    }
}
