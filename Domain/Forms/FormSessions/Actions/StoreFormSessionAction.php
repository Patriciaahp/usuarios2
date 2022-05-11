<?php

namespace Domain\Forms\FormSessions\Actions;

use Domain\Forms\FormSessions\ResponseCodes\ResponseCodeFormSessionStored;
use Domain\Forms\Models\FormSession;
use Str;

class StoreFormSessionAction
{

    private $hash;
    private $formSession;

    public function __construct()
    {
        $this->hash = Str::random(20);
    }

    public function execute()
    {
        $this->formSession = FormSession::create([
            'hash' => $this->hash
        ]);
        return new ResponseCodeFormSessionStored($this->formSession);
    }
}
