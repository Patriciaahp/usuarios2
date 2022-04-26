<?php

namespace Domain\Forms\Forms\Actions;

use App\Models\Form;
use Domain\Forms\Forms\ResponseCodes\ResponseCodeFormDeleted;

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
