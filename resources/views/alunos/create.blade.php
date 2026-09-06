@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
    <h1>Cadastrar Aluno</h1>

    <form method="POST" action="{{ route('alunos.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="text" name="curso" placeholder="Curso" value="{{ old('curso') }}">
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}">
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
