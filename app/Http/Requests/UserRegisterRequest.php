<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRegisterRequest extends FormRequest
{

    /**
     * @param Request $request
     * @return \string[][]
     */
    public function rules(Request $request): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'name' => ['required'],
            'surname' => ['required']
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Hasło',
            'name' => 'Imię',
            'surname' => 'Nazwisko'
        ];
    }

}
