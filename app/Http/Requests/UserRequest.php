<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'         => 'required|email|unique:users,email'.$this->id,
            'password'      => 'required',
            'phone'         => 'required',
            'city'          => 'required',
            'gender'        => 'required',
            'birth_date'    => 'required|date',
            'avatar'         => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }
}
