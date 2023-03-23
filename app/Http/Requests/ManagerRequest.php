<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
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
            'email'         => 'required|email|unique:managers,email'.$this->id,
            'password'      => 'required',
            'national_id'   => 'required|integer',
            'gender'        => 'required',
            'birth_date'    => 'required|date',
            'avatar'         => 'nullable|image|mimes:jpg,jpeg,png'
        ];
    }

    // public function messages(){

    //     return [
    //         'required'  => 'هذا الحقل مطلوب ',
    //         'max'  => 'هذا الحقل طويل',
    //         'category_id.exists'  => 'القسم غير موجود ',
    //         'email.email' => 'ضيغه البريد الالكتروني غير صحيحه',
    //         'address.string' => 'العنوان لابد ان يكون حروف او حروف وارقام ',
    //         'name.string'  =>'الاسم لابد ان يكون حروف او حروف وارقام ',
    //         'logo.required_without'  => 'الصوره مطلوبة',
    //         'email.unique' => 'البريد الالكتروني مستخدم من قبل ',
    //         'mobile.unique' => 'رقم الهاتف مستخدم من قبل ',


    //     ];
    // }

}
