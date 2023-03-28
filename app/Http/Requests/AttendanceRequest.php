<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' =>  ['required','exists:users,id'],
            'gym_id' =>  ['required','exists:gyms,id'],
            'session_id' =>  ['required','exists:training_sessions,id'],
            'attendance_time' =>  ['required'],
            'attendance_date' =>  ['required'],
        ];
    }
}
