<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegistrationReq extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "first_name"    => "required",
            "last_name"     => "required",
            "username"      => "required|unique:users",
            "gender"        => "required",
            "email"         => "required|unique:users",
            "phone"         => "required|unique:users",
            "department"    => "required",
            "password"      => "required",
            "confirm_pass"  => "required|same:password"
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            "success"   => false,
            "message"   => "Please check inputs.",
            "data"      => $validator->errors()
        ], 422));
    }
}
