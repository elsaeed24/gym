<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GymRequest extends FormRequest
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
            'manager_id'    => ['required','int','exists:managers,id'],
            'type'          =>   'in:male,female,both',
            'avatar'         => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }
}
