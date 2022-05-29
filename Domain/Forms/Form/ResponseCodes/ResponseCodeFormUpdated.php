<?php

namespace Domain\Forms\Form\ResponseCodes;

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
