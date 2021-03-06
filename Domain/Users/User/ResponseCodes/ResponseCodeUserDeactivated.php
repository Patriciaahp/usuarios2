<?php

namespace Domain\Users\User\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeUserDeactivated extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            200,
            ActionResponseCode::STATUS_SUCCESS,
            'User deactivated',
            $object
        );
    }
}
