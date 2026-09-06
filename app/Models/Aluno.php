<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['name', 'email', 'curso_id', 'user_id', 'data_nascimento'])]
class Aluno extends Model
{
    use HasFactory;

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeDoCurso(Builder $query, string $nomeDoCurso): Builder
    {
        return $query->whereHas('curso', fn (Builder $q) => $q->where('nome', $nomeDoCurso));
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
