<?php

namespace Flyff\Modules\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopItemCreateRequest extends FormRequest
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
            'name' => 'required|string',
            'index' => 'nullable|integer',
            'description' => 'nullable|string',
            'donate_points' => 'nullable|integer',
            'vote_points' => 'nullable|integer',
            'image' => 'nullable|string',
            'active' => 'nullable|boolean',
            'amount' => 'nullable|integer',
            'tradable' => 'nullable|boolean',
            'stackable' => 'nullable|boolean',
            'categories' => 'nullable|array',
        ];
    }
}
