<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserInCompanyRequest extends FormRequest
{

    /**
     * @param Request $request
     * @return \string[][]
     */
    public function rules(Request $request): array
    {
        return [
            'name' => ['required'],
            'surname' => ['required']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'imie',
            'surname' => 'nazwisko'
        ];
    }
}
