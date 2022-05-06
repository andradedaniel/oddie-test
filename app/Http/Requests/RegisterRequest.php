<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Http\Requests\Traits\FailedValidation;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use FailedValidation;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'cpf' => ['nullable','digits:11'],
            'whatsapp' => ['nullable'],
            'password' => ['required', 'string', 'confirmed'],
            'is_admin' => ['boolean'],
        ];
    }
}
