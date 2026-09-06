<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'curso', 'data_nascimento'])]
class Aluno extends Model
{
    use HasFactory;

    public function scopeDoCurso(Builder $query, string $curso): Builder
    {
        return $query->where('curso', $curso);
    }

    public function scopeComNomeContendo(Builder $query, string $termo): Builder
    {
        return $query->where('name', 'like', "%{$termo}%");
    }

    public function scopeCadastradosRecentemente(Builder $query, int $dias = 7): Builder
    {
        return $query->where('created_at', '>=', now()->subDays($dias));
    }
}
