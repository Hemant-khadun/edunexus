<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoursesRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'grade' => 'required|exists:programs,id',
            'topic' => 'required|exists:topics,id',
            'subject' => 'required|exists:subjects,id',
            'category' => 'required|exists:categories,id',
            'material' => 'required|exists:materials,title',
        ];
        return $rules;
    }
}
