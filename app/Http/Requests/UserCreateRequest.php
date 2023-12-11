<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users|max:50',
            'password' => 'required',
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'no_hp' => 'required|max:16',
            'kode_pos' => 'required|max:6',
            'role' => 'required'
        ];
    }
}
