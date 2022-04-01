<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'password.required' => 'Password required',
            'email.unique' => 'Email already exists',
        ];

    }
}
