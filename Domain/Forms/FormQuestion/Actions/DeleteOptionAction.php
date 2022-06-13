<?php

namespace Domain\Forms\FormQuestion\Actions;

use Domain\Forms\FormQuestion\ResponseCodes\ResponseCodeOptionDeleted;
use Domain\Forms\Models\Option;

class DeleteOptionAction
{

    private $option;

    public function __construct(Option $option)
    {
        $this->option = $option;
    }

    public function execute()
    {
        $this->option->forceDelete();
        return new ResponseCodeOptionDeleted();
    }

}
