<?php

namespace Domain\Users\User\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeUserStored extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            201,
            ActionResponseCode::STATUS_SUCCESS,
            'User created',
            $object
        );
    }
}
