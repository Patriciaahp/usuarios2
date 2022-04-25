<?php

namespace Domain\Forms\Forms\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormUpdated extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'Form updated',
            $object
        );
    }

}
