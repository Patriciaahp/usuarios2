<?php

namespace App\Panel\Questions\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormQuestionUpdateRequest extends FormRequest
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
            'label' => 'nullable|string|max:20',
            'required' => 'in:yes,no',
            'order_' => 'nullable',
            'placeholder' => 'nullable|max:20',
            'helpText' => 'nullable',

        ];
    }
}
