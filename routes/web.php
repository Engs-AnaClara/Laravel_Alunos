<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () {
    return 'Esta é a página Sobre.';
});

Route::get('/alunos', function () {
    return 'Esta é a página de Alunos.';
});

Route::get('/contato', function () {
    return 'Esta é a página de Contato.';
});
