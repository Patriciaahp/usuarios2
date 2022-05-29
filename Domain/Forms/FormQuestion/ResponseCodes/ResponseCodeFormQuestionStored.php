<?php

namespace Domain\Forms\FormQuestion\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormQuestionStored extends ActionResponseCode
{

    function __construct($object)
    {
        parent::__construct(
            201,
            ActionResponseCode::STATUS_SUCCESS,
            'Form question created',
            $object
        );
    }

}
