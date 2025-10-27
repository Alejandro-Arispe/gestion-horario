<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('horario', function (Blueprint $table) {
            $table->id('id_horario');                       // PK
            $table->string('dia', 15);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('id_docente')                 // FK docente
                  ->constrained('docente')
                  ->onDelete('cascade');
            $table->foreignId('id_grupo')                   // FK grupo
                  ->constrained('grupo')
                  ->onDelete('cascade');
            $table->foreignId('id_aula')                    // FK aula
                  ->constrained('aula')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('horario');
    }
};
