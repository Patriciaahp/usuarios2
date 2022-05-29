<?php

namespace Domain\Forms\FormSession\Actions;

use Domain\Forms\FormSession\ResponseCodes\ResponseCodeFormSessionStored;
use Domain\Forms\Models\FormSession;
use Str;

class StoreFormSessionAction
{
    /**
     * @param array $data
     */
    private $hash;
    private $started_at;
    private $finished_at;
    private $form_id;
    private $formSession;

    public function __construct(array $data)
    {
        $this->array = $data;
        $this->form_id = isset($data['form_id']) ? $data['form_id'] : null;
        $this->hash = Str::random(20);
        $this->started_at = date('Y-m-d H:i:s');
        $this->finished_at = date('Y-m-d H:i:s');
    }

    public function execute()
    {
        $this->formSession = FormSession::create([
            'hash' => $this->hash,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at,
            'form_id' => $this->form_id
        ]);
        return new ResponseCodeFormSessionStored($this->formSession);
    }
}
