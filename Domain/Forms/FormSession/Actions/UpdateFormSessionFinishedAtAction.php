<?php

namespace Domain\Forms\FormSession\Actions;

use Domain\Forms\FormSession\ResponseCodes\ResponseCodeFormSessionStored;
use Domain\Forms\Models\FormSession;
use Str;

class UpdateFormSessionFinishedAtAction
{
    /**
     * @param array $data
     */

    private $finished_at;
    private $formSession;

    public function __construct(FormSession $formSession, array $data)
    {
        $this->formSession = $formSession;

        $this->finished_at = isset($data['finished_at']) ? $data['finished_at'] : null;
    }

    public function execute()
    {
        $data['finished_at'] = ($this->finished_at);
        $this->formSession->fill($data);
        $this->formSession->save();

        return new ResponseCodeFormSessionStored($this->formSession);
    }
}
