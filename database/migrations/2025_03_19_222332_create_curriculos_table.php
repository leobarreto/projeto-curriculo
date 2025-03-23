<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('curriculos', function (Blueprint $table) {
            $table->id(); // ID primário auto-incremental
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com users
            $table->string('nome'); // Nome do candidato
            $table->string('email')->unique(); // E-mail único
            $table->string('cpf', 14)->unique(); // CPF único com 11 caracteres
            $table->date('data_nascimento'); // Data no formato YYYY-MM-DD
            $table->string('sexo'); // Enum para sexo
            $table->string('estado_civil'); // Estado civil
            $table->string('escolaridade'); // Nível de escolaridade
            $table->text('cursos_especializacoes')->nullable(); // Cursos e especializações (pode ser nulo)
            $table->text('experiencia_profissional')->nullable(); // Experiência profissional
            $table->decimal('pretensao_salarial', 10, 2); // Pretensão salarial com 2 casas decimais
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculos');
    }
};
