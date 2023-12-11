<?php

namespace Flyff\Modules\Vote\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PingBackVoteRequest extends FormRequest
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
            'VoterIP' => 'required|string',
            'Successful' => 'required|int',
            'pingUsername' => 'required|string',
            'pingbackkey' => 'nullable|string',
            'Reason' => 'nullable|string',
        ];
    }
}
