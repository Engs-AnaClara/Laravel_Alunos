<?php

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->foreignIdFor(Curso::class)->nullable()->after('email')->constrained()->nullOnDelete();
        });

        Aluno::all()->each(function (Aluno $aluno) {
            $curso = Curso::firstOrCreate(['nome' => $aluno->curso]);
            $aluno->update(['curso_id' => $curso->id]);
        });

        Schema::table('alunos', function (Blueprint $table) {
            $table->dropColumn('curso');
        });
    }

    public function down(): void
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->string('curso')->nullable();
        });

        Aluno::with('curso')->each(function (Aluno $aluno) {
            $aluno->update(['curso' => $aluno->curso?->nome]);
        });

        Schema::table('alunos', function (Blueprint $table) {
            $table->dropForeign(['curso_id']);
            $table->dropColumn('curso_id');
        });
    }
};
