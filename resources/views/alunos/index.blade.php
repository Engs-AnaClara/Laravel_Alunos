@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
    <h1>Lista de Alunos</h1>

    @if (count($alunos) > 0)
        <ul>
            @foreach ($alunos as $aluno)
                <li>
                    <a href="{{ route('alunos.show', $aluno) }}">{{ $aluno->name }}</a>
                    - <a href="{{ route('cursos.show', $aluno->curso) }}">{{ $aluno->curso->nome }}</a>
                    <a href="{{ route('alunos.edit', $aluno) }}">Editar</a>
                    <form method="POST" action="{{ route('alunos.destroy', $aluno) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhum aluno cadastrado.</p>
    @endif
@endsection
