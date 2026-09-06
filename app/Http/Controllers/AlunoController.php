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
        $alunos = Aluno::orderBy('name')->get();

        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email',
            'curso' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
        ]);

        Aluno::create($dados);

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno cadastrado com sucesso.');
    }

    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        return view('alunos.show', compact('aluno'));
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'curso' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
        ]);

        $aluno->update($dados);

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        Aluno::findOrFail($id)->delete();

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno removido com sucesso.');
    }
}
