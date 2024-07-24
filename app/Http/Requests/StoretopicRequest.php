<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoretopicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check(); // Only authenticated users are authorized
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'grade' => 'required|int|min:1',
            'subject' => 'required|int|min:1',
            'course' => 'required|int|min:1',
        ];
    }
}
