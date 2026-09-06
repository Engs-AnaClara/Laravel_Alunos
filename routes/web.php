<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfileController;
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
Route::get('/cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');

Route::get('/produto/{id}', function ($id) {
    return "Produto com ID: {$id}";
});

Route::get('/categoria/{id}', function ($id) {
    return "Categoria com ID: {$id}";
});

Route::get('/usuario/{id}', function ($id) {
    return "Usuário com ID: {$id}";
});

Route::get('/admin', function () {
    return 'Área restrita ao Admin.';
})->middleware(['auth', 'role:admin']);

Route::get('/professor', function () {
    return 'Área restrita ao Professor.';
})->middleware(['auth', 'role:professor,admin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
