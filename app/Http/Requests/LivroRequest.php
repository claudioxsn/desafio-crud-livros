<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LivroRequest extends FormRequest
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
            'Titulo' => ['required', 'string', 'max:255'],
            'Editora' => ['required', 'string', 'max:255'],
            'Edicao' => ['required', 'integer', 'min:1'],
            'AnoPublicacao' => ['required', 'integer', 'between:1900,' . now()->year],
            'Valor' => ['required', 'numeric', 'min:0'],
            'Livro_CodAu' => ['required', 'array', 'min:1'],
            'Livro_CodAu.*' => ['exists:Autor,CodAu'],
            'Livro_CodAs' => ['required', 'array', 'min:1'],
            'Livro_CodAs.*' => ['exists:Assunto,CodAs'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
}
