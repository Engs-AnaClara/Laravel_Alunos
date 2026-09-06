<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'curso_id' => fn () => Curso::inRandomOrder()->first()?->id ?? Curso::factory(),
            'data_nascimento' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
        ];
    }
}
