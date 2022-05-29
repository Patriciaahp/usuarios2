<?php

namespace Domain\Forms\Answer\ResponseCodes;

use Domain\Shared\ActionResponseCode;

class ResponseCodeAnswerStored extends ActionResponseCode
{
    function __construct($object)
    {
        parent::__construct(
            201,
            ActionResponseCode::STATUS_SUCCESS,
            'Answer stored',
            $object
        );
    }


}

{

}
