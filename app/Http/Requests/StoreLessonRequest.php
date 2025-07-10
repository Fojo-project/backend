<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'lesson_order' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'lesson_note' => 'nullable|string',
            'lesson_content' => 'nullable|string',
            'lesson_video' => 'nullable|url',
            'lesson_image' => 'nullable|string|max:2048',
        ];
    }
}
