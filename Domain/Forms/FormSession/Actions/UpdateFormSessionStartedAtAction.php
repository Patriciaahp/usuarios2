<?php

namespace Domain\Forms\FormSession\Actions;

use Domain\Forms\FormSession\ResponseCodes\ResponseCodeFormSessionStartedAtUpdate;
use Domain\Forms\Models\FormSession;
use Str;

class UpdateFormSessionStartedAtAction
{
    /**
     * @param array $data
     */

    private $started_at;
    private $formSession;

    public function __construct(FormSession $formSession, array $data)
    {
        $this->formSession = $formSession;

        $this->started_at = isset($data['started_at']) ? $data['started_at'] : null;
    }

    public function execute()
    {
        $data['started_at'] = ($this->started_at);
        $this->formSession->fill($data);
        $this->formSession->save();

        return new ResponseCodeFormSessionStartedAtUpdate($this->formSession);
    }
}
