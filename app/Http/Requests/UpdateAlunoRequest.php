<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('alunos', 'email')->ignore($this->route('aluno'))],
            'curso' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
        ];
    }
}
