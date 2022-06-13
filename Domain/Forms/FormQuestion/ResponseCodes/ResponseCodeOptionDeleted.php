<?php

namespace Domain\Forms\FormQuestion\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeOptionDeleted extends ActionResponseCode
{
    function __construct()
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'Option deleted',
        );
    }

}
