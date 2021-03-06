<?php

namespace Domain\Forms\FormQuestion\Actions;

use Domain\Forms\FormQuestion\ResponseCodes\ResponseCodeFormQuestionStored;
use Domain\Forms\Models\FormQuestion;
use InvalidArgumentException;


class StoreFormQuestionAction
{
    /**
     * @param array $data
     */

    private $label;
    private $help_text;
    private $placeholder;
    private $required;
    private $order;
    private $type_id;
    private $form_id;
    private $question;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->label = isset($data['label']) ? $data['label'] : null;

        if (!isset($data['required']))
            throw new InvalidArgumentException('field required is required.');
        $this->required = isset($data['required']) ? $data['required'] : null;

        if (!isset($data['order_']))
            throw new InvalidArgumentException('order is required.');
        $this->order = isset($data['order_']) ? $data['order_'] : null;

        $this->placeholder = isset($data['placeholder']) ? $data['placeholder'] : null;

        $this->help_text = isset($data['help_text']) ? $data['help_text'] : null;

        $this->type_id = isset($data['type_id']) ? $data['type_id'] : null;

        $this->form_id = isset($data['form_id']) ? $data['form_id'] : null;

    }

    public function execute()
    {
        $this->question = FormQuestion::create([
            'label' => $this->label,
            'required' => $this->required === 'no' ? 0 : 1,
            'order_' => $this->order,
            'placeholder' => $this->placeholder,
            'help_text' => $this->help_text,
            'type_id' => $this->type_id,
            'form_id' => $this->form_id
        ]);

        return new ResponseCodeFormQuestionStored($this->question);
    }
}
