<?php

namespace Domain\Forms\Form\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormStored extends ActionResponseCode
{

    function __construct($object)
    {
        parent::__construct(
            201,
            ActionResponseCode::STATUS_SUCCESS,
            'Form created',
            $object
        );
    }

}
