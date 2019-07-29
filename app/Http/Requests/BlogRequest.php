<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'content' => 'required|between:10,300',
            'url' => 'required|url',
        ];
    }

    public function messages ()
    {
        return [
            "title.required" => "Vous devez mettre un titre à votre article",
            "title.min" => "Votre article doit faire au moins 5 caractères",
            "content.required" => "Vous ne pouvez pas créér un article sans contenu",
            "content.between" => "Le contenu de votre article doit faire entre 10 et 300",
            "url.required" => "Vous devez mettre une url d'image pour votre article",
            "url.url" => "Votre url n'est pas valide !",
        ];
    }
}
