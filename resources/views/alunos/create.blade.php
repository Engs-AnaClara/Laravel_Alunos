@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
    <h1>Cadastrar Aluno</h1>

    <form method="POST" action="{{ route('alunos.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Nome">
        <button type="submit">Salvar</button>
    </form>
@endsection
