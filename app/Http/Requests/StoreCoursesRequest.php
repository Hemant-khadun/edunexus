<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoursesRequest extends FormRequest
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
    
        if ($this->input('material') === 'Video') {
            $rules['video'] = 'required|file|mimes:mp4,mov|max:20480'; // Add the 'video' field requirement
        }else if ($this->input('material') === 'Quiz'){
                $rules['quiz_questions.*'] = 'required_without_all:quiz_questions.*|string'; 
        }else if ($this->input('material') === 'File'){
            $rules['file'] = 'required|file|max:20480'; 
        }else if ($this->input('material') === 'Text'){
            $rules['course_text'] = 'required|string'; 
        }

        return $rules;
    }
}
