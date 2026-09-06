<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\Aluno;
use App\Models\Curso;

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
        $alunos = Aluno::with('curso')->orderBy('name')->get();

        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        $this->authorize('create', Aluno::class);

        $cursos = Curso::orderBy('nome')->get();

        return view('alunos.create', compact('cursos'));
    }

    public function store(StoreAlunoRequest $request)
    {
        $this->authorize('create', Aluno::class);

        Aluno::create($request->validated());

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno cadastrado com sucesso.');
    }

    public function show(string $id)
    {
        $aluno = Aluno::with('curso')->findOrFail($id);

        return view('alunos.show', compact('aluno'));
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $this->authorize('update', $aluno);

        $cursos = Curso::orderBy('nome')->get();

        return view('alunos.edit', compact('aluno', 'cursos'));
    }

    public function update(UpdateAlunoRequest $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $this->authorize('update', $aluno);

        $aluno->update($request->validated());

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $this->authorize('delete', $aluno);

        $aluno->delete();

        return redirect()->route('alunos.index')->with('sucesso', 'Aluno removido com sucesso.');
    }
}
