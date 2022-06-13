<?php

namespace Domain\Forms\FormQuestion\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeOptionStored extends ActionResponseCode
{

    function __construct($object)
    {
        parent::__construct(
            201,
            ActionResponseCode::STATUS_SUCCESS,
            'Option created',
            $object
        );
    }

}
