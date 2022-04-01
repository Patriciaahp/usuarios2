<?php

namespace App\Http\Requests;


use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/u',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => '',

        ];
    }

    public function updateUser(User $user)
    {
        $user->fill([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,

        ]);

        if ($this->password != null) {
            $user->password = bcrypt($this->password);
        }

        $user->save();

    }
}
