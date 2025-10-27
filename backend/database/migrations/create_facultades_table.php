<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('facultad', function (Blueprint $table) {
            $table->id('id_facultad');                 // PK
            $table->string('nombre', 100);             // Nombre de la facultad
            $table->string('sigla', 20)->unique();     // Sigla única
            $table->boolean('activo')->default(true);  // Estado
        });
    }

    public function down(): void {
        Schema::dropIfExists('facultad');
    }
};
