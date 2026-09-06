<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            'Engenharia de Software',
            'Ciência da Computação',
            'Sistemas de Informação',
            'Análise e Desenvolvimento de Sistemas',
        ])->each(fn (string $nome) => Curso::firstOrCreate(['nome' => $nome]));

        Aluno::factory()->count(10)->create();
    }
}
