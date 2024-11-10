<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class upadateRequest extends FormRequest
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
            'title'=>['required','string','between:2,255'],
            'slug'=>['required','string','between:2,255','unique:articles'],
            'content'=>['required','string'],
            'thumbnail'=>['required','image'],
            'category_id'=>['integer','exists:categories,id'],
            'tag_ids'=>['array','exists:tags,id'],
        ];
    }
    public function messages(){
        return[ 
            "title.required"=>"le champs titre est obligatoire",
            "title.string"=>"le champs titre doit être des chaîne de caractéres",
            "title.between"=>"le champs titre doit compris entre 2 à 255 caractére",
            "slug.required"=>"le champs slug est obligatoire",
            "slug.string"=>"le champs slug doit être des chaîne de caractéres ",
            "slug.unique"=>"le slug est déjà associé à un article",
            "content.required"=>"le champs content est obligatoire",
            "thumbnail.required"=>"le champs image est obligatoire",
            "thumbnail.image"=>"le champs image doit être forcement une image",
            "category_id.integer"=>"la valeur du champs doit être un entier",
            "category_id.exists"=>"la valeur du categorie n'existe pas",
            "tag_ids.exists"=>"la valeur de l' étiquéte n'existe pas",
        
        
        ];
    }
}
