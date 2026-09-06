@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
    <h1>Editar Aluno</h1>

    <form method="POST" action="{{ route('alunos.update', $aluno) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ old('name', $aluno->name) }}">
        <input type="email" name="email" value="{{ old('email', $aluno->email) }}">
        <input type="text" name="curso" value="{{ old('curso', $aluno->curso) }}">
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $aluno->data_nascimento) }}">
        <button type="submit">Atualizar</button>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif
@endsection
