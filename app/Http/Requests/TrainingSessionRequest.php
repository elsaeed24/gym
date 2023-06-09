<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingSessionRequest extends FormRequest
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
            'name'          => 'required|string|max:191',
            'starts_at'     => 'required',
            'finishes_at'   => 'required|after:starts_at',
            // 'day'                 =>  'in:sat, sun, mon, tue, wed, thu, fri',
            'gym_id'          => ['required','exists:gyms,id'],
        ];
    }
}
