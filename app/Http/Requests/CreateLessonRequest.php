<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string',
            'group_id'      => 'required|integer|min:1',
            'teacher_id'    => 'required|integer|min:1',
            'lesson_date'   => 'required|date_format:d.m.Y|after:now',
            'lesson_time'   => 'required|integer|min:1',
            'room'          => 'required|integer|min:1',
            'homework_id'   => 'nullable|integer|exists:homeworks,id'
        ];
    }
}
