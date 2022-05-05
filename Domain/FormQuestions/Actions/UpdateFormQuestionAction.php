<?php

namespace Domain\FormQuestions\Actions;

use App\Models\FormQuestion;
use Domain\FormQuestions\ResponseCodes\ResponseCodeFormQuestionUpdated;

class UpdateFormQuestionAction
{
    private $label;
    private $help_text;
    private $placeholder;
    private $required;
    private $order;
    private $type_id;
    private $form_id;
    private $question;

    public function __construct(FormQuestion $question, array $data)
    {
        $this->question = $question;


        $this->label = isset($data['label']) ? $data['label'] : $question['label'];


        $this->required = isset($data['required']) ? $data['required'] : $question['required'];


        $this->order = isset($data['order_']) ? $data['order_'] : $question['order_'];

        $this->placeholder = isset($data['placeholder']) ? $data['placeholder'] : $question['placeholder'];

        $this->help_text = isset($data['help_text']) ? $data['help_text'] : $question['help_text'];

        $this->type_id = isset($data['type_id']) ? $data['type_id'] : $question['type_id'];

        $this->form_id = isset($data['form_id']) ? $data['form_id'] : $question['form_id'];
    }

    public function execute()
    {
        $data = array(
            'label' => $this->label,
            'required' => $this->required === 'no' ? 0 : 1,
            'order_' => $this->order,
            'placeholder' => $this->placeholder,
            'help_text' => $this->help_text,
            'type_id' => $this->type_id,
            'form_id' => $this->form_id
        );
        $this->question->fill($data);

        $this->question->save();
        return new ResponseCodeFormQuestionUpdated($this->question);
    }
}
