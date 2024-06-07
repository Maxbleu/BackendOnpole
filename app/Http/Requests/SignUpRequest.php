<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'pais' => 'required'
        ];
    }

    /**

     * Obtiene los mensajes de error personalizados para las reglas de validación definidas.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'It is necessary to include a name.',
            'email.required' => 'It is necessary to include an email address.',
            'email.email' => 'The email format is invalid.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'It is necessary to include a password.',
            'password.min' => 'The password must be at least 8 characters long.',
            'pais.required' => 'It is necessary to include the country.'
        ];
    }
}
