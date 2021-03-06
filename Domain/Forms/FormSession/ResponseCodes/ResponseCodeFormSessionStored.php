<?php

namespace Domain\Forms\FormSession\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormSessionStored extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            201,
            ActionResponseCode::STATUS_SUCCESS,
            'Form session created',
            $object
        );
    }


}
