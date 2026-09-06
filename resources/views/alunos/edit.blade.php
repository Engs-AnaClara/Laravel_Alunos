@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
    <h1>Editar Aluno</h1>

    <form method="POST" action="{{ route('alunos.update', $aluno) }}">
        @csrf
        @method('PUT')

        <label for="name">Nome</label>
        <input type="text" id="name" name="name" value="{{ old('name', $aluno->name) }}">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $aluno->email) }}">

        <label for="curso_id">Curso</label>
        <select id="curso_id" name="curso_id">
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}" @selected(old('curso_id', $aluno->curso_id) == $curso->id)>{{ $curso->nome }}</option>
            @endforeach
        </select>

        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', $aluno->data_nascimento) }}">

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
