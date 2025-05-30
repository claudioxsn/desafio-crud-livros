<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'editora' => ['required', 'string', 'max:255'],
            'edicao' => ['required', 'integer', 'min:1'],
            'ano_publicacao' => ['required', 'integer', 'between:1900,' . now()->year],
            'valor' => ['required', 'numeric', 'min:0'],
            'autor_ids' => ['required', 'array', 'min:1'],
            'autor_ids.*' => ['exists:autores,id'],
            'assunto_ids' => ['required', 'array', 'min:1'],
            'assunto_ids.*' => ['exists:assuntos,id'],
        ];
    }
}
