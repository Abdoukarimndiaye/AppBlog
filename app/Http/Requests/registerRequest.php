<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            "nom"=>"required|string|between:5,255",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:8|confirmed"
        ];
    }
    public function messages(){
        return[
            "nom.required"=>"le champs nom est requis...",
            "nom.between"=>"le champs nom doit contenir au moins 5 caractéres...",
            "email.email"=>"le champs mail est incorrect...",
            "email.unique"=>"le champs mail existe dejà...",
            "password.required"=>"le champs mot de pass est requis...",
            "password.min"=>"le champs doit contenir au moins 8 caractéres",
            "password.confirmed"=>"les deux mots de pass ne concordent pas"

        ];
    }
}
