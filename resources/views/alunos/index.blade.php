@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
    <h1>Lista de Alunos</h1>

    @if (count($alunos) > 0)
        <ul>
            @foreach ($alunos as $aluno)
                <li>{{ $aluno }}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum aluno cadastrado.</p>
    @endif
@endsection
