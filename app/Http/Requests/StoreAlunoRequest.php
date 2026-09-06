<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email',
            'curso_id' => 'required|exists:cursos,id',
            'data_nascimento' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do aluno é obrigatório.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Informe um email válido.',
            'email.unique' => 'Já existe um aluno cadastrado com este email.',
            'curso_id.required' => 'O curso é obrigatório.',
            'curso_id.exists' => 'Selecione um curso válido.',
            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
        ];
    }
}
