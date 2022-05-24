<?php

namespace Domain\Forms\FormSessions\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormSessionCompletedUpdated extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'Completed updated',
            $object
        );
    }

}
