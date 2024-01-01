<?php

namespace Flyff\Modules\Account\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
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
            'account' => 'required|string|min:4|max:12|unique:account.ACCOUNT_TBL',
            'password' => 'required|string|min:4|max:12',
            'password_confirmation' => 'required|string|min:4|max:12|same:password',
        ];
    }
}
