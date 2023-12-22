<?php

namespace Flyff\Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
            'exp_rate' => 'required|numeric|min:0',
            'drop_rate' => 'required|numeric|min:0',
            'penya_rate' => 'required|numeric|min:0',
            'discord' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitch' => 'nullable|string|max:255',
            'theme' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'timezone' => 'required|string|max:255',
            'maintenance' => 'required|boolean',
        ];
    }
}
