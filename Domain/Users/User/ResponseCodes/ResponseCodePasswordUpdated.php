<?php

namespace Domain\Users\User\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodePasswordUpdated extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'Password updated',
            $object
        );
    }
}
