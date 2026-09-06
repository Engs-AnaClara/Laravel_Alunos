<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;

class AlunoPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Aluno $aluno): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin() || $user->isProfessor();
    }

    public function delete(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin();
    }
}
