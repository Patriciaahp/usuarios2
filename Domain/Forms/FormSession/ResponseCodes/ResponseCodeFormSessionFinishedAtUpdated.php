<?php

namespace Domain\Forms\FormSession\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeFormSessionFinishedAtUpdated extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            204,
            ActionResponseCode::STATUS_SUCCESS,
            'Finished_at updated',
            $object
        );
    }

}
