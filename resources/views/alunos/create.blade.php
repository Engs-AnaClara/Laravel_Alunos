@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
    <h1>Cadastrar Aluno</h1>

    <form method="POST" action="{{ route('alunos.store') }}">
        @csrf

        <label for="name">Nome</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">

        <label for="curso">Curso</label>
        <input type="text" id="curso" name="curso" value="{{ old('curso') }}">

        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}">

        <button type="submit">Salvar</button>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif
@endsection
