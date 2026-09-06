<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/sobre', function () {
    return 'Esta é a página Sobre.';
});

Route::get('/contato', function () {
    return 'Esta é a página de Contato.';
});

Route::get('/alunos/consultas/demo', [AlunoController::class, 'consultas']);
Route::resource('alunos', AlunoController::class);

Route::get('/produto/{id}', function ($id) {
    return "Produto com ID: {$id}";
});

Route::get('/categoria/{id}', function ($id) {
    return "Categoria com ID: {$id}";
});

Route::get('/usuario/{id}', function ($id) {
    return "Usuário com ID: {$id}";
});
