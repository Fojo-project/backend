<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'title' => 'required|string|in:foundations,discipleship,ministry,leadership',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'about_course' => 'nullable|string',
            'course_video' => 'nullable|url',
            'course_image' => 'nullable|url',
            'course_text' => 'nullable|string',
            'color_code' => 'nullable|string|regex:/^#[A-Fa-f0-9]{6}$/',
        ];
    }
}
