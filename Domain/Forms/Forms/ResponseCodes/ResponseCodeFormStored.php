<?php

namespace Domain\Forms\Forms\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormStored extends ActionResponseCode
{

    function __construct($object)
    {
        parent::__construct(
            201,
            ActionResponseCode::STATUS_SUCCES,
            'Form created',
            $object
        );
    }

}
