<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('gestion_academica', function (Blueprint $table) {
            $table->id('id_gestion');                   // PK
            $table->string('nombre', 20);               // Ej: "2025-1"
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('activo')->default(false);  // Solo una gestión activa
        });
    }

    public function down(): void {
        Schema::dropIfExists('gestion_academica');
    }
};
