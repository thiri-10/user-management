<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmin_userRequest extends FormRequest
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
            'name' =>'required',
            'username' => 'required',
            'role_id' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required',
        ];
    }
}
