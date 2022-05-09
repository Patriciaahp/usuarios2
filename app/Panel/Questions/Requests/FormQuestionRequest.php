<?php

namespace App\Panel\Questions\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'label' => 'required|string',
            'required' => 'in:yes,no',
            'order_' => 'required',
            'placeholder' => 'nullable',
            'helpText' => 'nullable',
            'form_id' => 'required|exists:forms,id',
            'type_id' => 'required|exists:form_question_types,id'
        ];
    }
}
