<?php

namespace Domain\Users\Users\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeUserActivated extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            200,
            ActionResponseCode::STATUS_SUCCESS,
            'User activated',
            $object
        );
    }
}
