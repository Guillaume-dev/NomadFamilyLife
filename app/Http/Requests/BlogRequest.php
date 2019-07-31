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
            'content' => 'required|min:10',
            'url' => 'required|url',
        ];
    }

    public function messages ()
    {
        return [
            "title.required" => "Vous devez mettre un titre à votre article",
            "title.min" => "Votre article doit faire au moins 5 caractères",
            "content.required" => "Vous ne pouvez pas créér un article sans contenu",
            "content.min" => "Le contenu de votre article doit faire plus 10 caractères",
            "url.required" => "Vous devez mettre une url d'image pour votre article",
            "url.url" => "Votre url n'est pas valide !",
        ];
    }
}
