<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class vvalidateLoginRequest extends FormRequest
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
            'email'=>"required|email",
            'password'=>"required",
        ];
    }
    public function messages(){
        return
        [
            'email.required'=>'le champs mail est requis...',
            'email.email'=>'le format mail est invalide...',
            'password.required'=>'le champs mot de pass est requis...'

        ];
    }
}
