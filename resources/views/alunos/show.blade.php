@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
    <h1>Detalhes do Aluno</h1>

    <p>Nome: {{ $aluno->name }}</p>
    <p>Email: {{ $aluno->email }}</p>
    <p>Curso: {{ $aluno->curso }}</p>
    <p>Data de Nascimento: {{ $aluno->data_nascimento }}</p>
@endsection
