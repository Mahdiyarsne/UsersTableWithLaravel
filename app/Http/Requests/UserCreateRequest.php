<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:users|email:rfc',
            'password' => [
                'required',
                Password::defaults()
            ],
            'password_comfirmation' => 'required',
            'created_at' => 'required'

        ];
    }

    public function messages()
    {
        return [

            'created_at' => 'The date field cannot be blank',
        ];
    }
}
