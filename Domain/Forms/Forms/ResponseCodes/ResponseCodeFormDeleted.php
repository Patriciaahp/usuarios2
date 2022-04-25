<?php

namespace Domain\Forms\Forms\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormDeleted extends ActionResponseCode
{
    function __construct()
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'Form deleted',
        );
    }

}
