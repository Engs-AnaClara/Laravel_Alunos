@extends('layouts.app')

@section('title', $curso->nome)

@section('content')
    <h1>Alunos do curso: {{ $curso->nome }}</h1>

    @if ($curso->alunos->count() > 0)
        <ul>
            @foreach ($curso->alunos as $aluno)
                <li>
                    <a href="{{ route('alunos.show', $aluno) }}">{{ $aluno->name }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhum aluno matriculado neste curso.</p>
    @endif
@endsection
