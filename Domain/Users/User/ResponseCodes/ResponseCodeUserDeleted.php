<?php

namespace Domain\Users\User\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeUserDeleted extends ActionResponseCode
{
    function __construct()
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'User deleted',
        );
    }

}
