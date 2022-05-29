<?php

namespace Domain\Forms\Form\Actions;

use Domain\Forms\Form\ResponseCodes\ResponseCodeFormUpdated;
use Domain\Forms\Models\Form;

class UpdateFormAction
{

    private $name;
    private $title;
    private $description;
    private $form;

    public function __construct(Form $form, array $data)
    {
        $this->form = $form;

        $this->name = isset($data['name']) ? $data['name'] : $form['name'];
        $this->title = isset($data['title']) ? $data['title'] : $form['title'];
        $this->description = isset($data['description']) ? $data['description'] : $form['description'];

    }

    public function execute()
    {
        $data = array(
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description
        );
        $this->form->fill($data);

        $this->form->save();
        return new ResponseCodeFormUpdated($this->form);
    }

}
