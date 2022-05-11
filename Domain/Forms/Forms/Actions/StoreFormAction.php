<?php

namespace Domain\Forms\Forms\Actions;

use Domain\Forms\Forms\ResponseCodes\ResponseCodeFormStored;
use Domain\Forms\Models\Form;
use InvalidArgumentException;
use Str;

class StoreFormAction
{
    /**
     * @param array $data
     */

    private $name;
    private $title;
    private $description;
    private $hash;
    private $form;

    public function __construct(array $data)
    {
        $this->data = $data;

        if (!isset($data['name']))
            throw new InvalidArgumentException('name is required.');

        $this->name = isset($data['name']) ? $data['name'] : null;

        if (!isset($data['title']))
            throw new InvalidArgumentException('title is required.');
        $this->title = isset($data['title']) ? $data['title'] : null;

        if (!isset($data['description']))
            throw new InvalidArgumentException('description is required.');
        $this->description = isset($data['description']) ? $data['description'] : null;

        $this->hash = Str::random(20);
    }

    public function execute()
    {
        $this->form = Form::create([
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'hash' => $this->hash
        ]);

        return new ResponseCodeFormStored($this->form);
    }
}
