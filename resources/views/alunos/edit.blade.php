@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
    <h1>Editar Aluno</h1>

    <form method="POST" action="{{ route('alunos.update', $id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Nome">
        <button type="submit">Atualizar</button>
    </form>
@endsection
