<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function consultas()
    {
        $doCurso = Aluno::doCurso('Engenharia de Software')->get();
        $comNome = Aluno::comNomeContendo('ana')->get();
        $recentes = Aluno::cadastradosRecentemente(30)->get();
        $total = Aluno::count();

        return response()->json([
            'do_curso' => $doCurso,
            'com_nome_contendo' => $comNome,
            'cadastrados_recentemente' => $recentes,
            'total_de_alunos' => $total,
        ]);
    }

    public function index()
    {
        $alunos = ['Ana Clara', 'Bruno Silva', 'Carla Souza'];

        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        return 'Aluno cadastrado.';
    }

    public function show(string $id)
    {
        return view('alunos.show', compact('id'));
    }

    public function edit(string $id)
    {
        return view('alunos.edit', compact('id'));
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
