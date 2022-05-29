<?php

namespace Domain\Users\User\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeUserUpdated extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'User updated',
            $object
        );
    }
}
