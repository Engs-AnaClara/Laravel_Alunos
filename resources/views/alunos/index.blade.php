@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
    <h1>Lista de Alunos</h1>

    <ul>
        <li>{{ $alunos[0] }}</li>
        <li>{{ $alunos[1] }}</li>
        <li>{{ $alunos[2] }}</li>
    </ul>
@endsection
