<?php

namespace App\Panel\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string|max:20|min:3',
            'surname' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => ['nullable', 'max:20', Password::min(6)->uncompromised()]
        ];
    }
}
