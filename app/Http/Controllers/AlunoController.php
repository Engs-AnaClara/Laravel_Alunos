<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return 'Listagem de alunos.';
    }

    public function create()
    {
        return 'Formulário de cadastro de aluno.';
    }

    public function store(Request $request)
    {
        return 'Aluno cadastrado.';
    }

    public function show(string $id)
    {
        return "Detalhes do aluno com ID: {$id}";
    }

    public function edit(string $id)
    {
        return "Formulário de edição do aluno com ID: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "Aluno com ID {$id} atualizado.";
    }

    public function destroy(string $id)
    {
        return "Aluno com ID {$id} removido.";
    }
}
