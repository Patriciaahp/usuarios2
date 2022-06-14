<?php

namespace Domain\Forms\FormQuestion\Actions;

use Domain\Forms\FormQuestion\ResponseCodes\ResponseCodeOptionStored;
use Domain\Forms\Models\Option;
use InvalidArgumentException;

class StoreOptionsAction
{

    private $option;
    private $question_id;

    public function __construct(array $data)
    {
        $this->data = $data;

        if (!isset($data['option']))
            throw new InvalidArgumentException('option is required');

        $this->option = isset($data['option']) ? $data['option'] : null;

        if (!isset($data['question_id']))
            throw new InvalidArgumentException('question_id is required');

        $this->question_id = isset($data['question_id']) ? $data['question_id'] : null;
    }

    public function execute()
    {
        $this->option = Option::create([
            'option' => $this->option,
            'question_id' => $this->question_id

        ]);

        return new ResponseCodeOptionStored($this->option);
    }


}
