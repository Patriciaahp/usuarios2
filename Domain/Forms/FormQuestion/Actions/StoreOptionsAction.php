<?php

namespace Domain\Forms\FormQuestion\Actions;

use Domain\Forms\FormQuestion\ResponseCodes\ResponseCodeOptionStored;
use Domain\Forms\Models\Option;
use InvalidArgumentException;

class StoreOptionsAction
{

    private $option;

    public function __construct(array $data)
    {
        $this->data = $data;

        if (!isset($data['option']))
            throw new InvalidArgumentException('option is required');

        $this->option = isset($data['option']) ? $data['option'] : null;
    }

    public function execute()
    {
        $this->option = Option::create([
            'option' => $this->option

        ]);

        return new ResponseCodeOptionStored($this->option);
    }


}
