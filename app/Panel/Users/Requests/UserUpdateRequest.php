<?php

namespace App\Panel\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
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
            'name' => 'nullable|string|max:20|min:3',
            'surname' => 'nullable',
            'email' => 'nullable|email|unique:users,email,' . $this->id,
            'password' => ['nullable', Password::min(6)->uncompromised()]
        ];
    }
}
