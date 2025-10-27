<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('materia', function (Blueprint $table) {
            $table->id('id_materia');                     // PK
            $table->string('nombre', 100);
            $table->string('codigo', 20)->unique();       // Código único
            $table->integer('nivel')->nullable();
            $table->foreignId('id_gestion')               // FK gestión
                  ->constrained('gestion_academica');
        });
    }

    public function down(): void {
        Schema::dropIfExists('materia');
    }
};
