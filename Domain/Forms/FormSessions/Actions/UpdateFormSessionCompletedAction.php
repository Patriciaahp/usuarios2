<?php

namespace Domain\Forms\FormSessions\Actions;

use Domain\Forms\FormSessions\ResponseCodes\ResponseCodeFormSessionCompletedUpdated;
use Domain\Forms\Models\FormSession;

class UpdateFormSessionCompletedAction
{
    private $completed;
    private $formSession;

    public function __construct(FormSession $formSession, array $data)
    {
        $this->formSession = $formSession;

        $this->completed = isset($data['completed']) ? $data['completed'] : null;
    }

    public function execute()
    {
        $data['completed'] = ($this->completed);
        $this->formSession->fill($data);
        $this->formSession->save();

        return new ResponseCodeFormSessionCompletedUpdated($this->formSession);
    }
}
