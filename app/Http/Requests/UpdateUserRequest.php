<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
			'fname' => 'required|string|min:3|max:255',
			'lname' => 'required|string|min:3|max:255',
			'gender' => 'required|in:male,female',
			'phone' => 'required|numeric|digits:10',
		];
	}

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'fname.required' => 'The first name field is required.',
            'fname.string' => 'The first name must be a string.',
            'fname.max' => 'The first name may not be greater than :max characters.',

            'lname.required' => 'The last name field is required.',
            'lname.string' => 'The last name must be a string.',
            'lname.max' => 'The last name may not be greater than :max characters.',

            'gender.required' => 'The gender field is required.',
            'gender.in' => 'The gender must be one of: male, female, other.',

            'phone.required' => 'The phone number field is required.',
            'phone.numeric' => 'The phone number must be a number.',
            'phone.digits' => 'The phone number must be exactly :digits digits.',
        ];
    }
}
