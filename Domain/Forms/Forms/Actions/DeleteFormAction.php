<?php

namespace Domain\Forms\Forms\Actions;

use Domain\Forms\Forms\ResponseCodes\ResponseCodeFormDeleted;
use Domain\Forms\Models\Form;

class DeleteFormAction
{
    private $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function execute()
    {
        $this->form->forceDelete();
        return new ResponseCodeFormDeleted();
    }

}
