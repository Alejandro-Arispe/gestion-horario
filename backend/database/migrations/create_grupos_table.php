<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('grupo', function (Blueprint $table) {
            $table->id('id_grupo');                        // PK
            $table->string('nombre', 10);                  // Ej: "A"
            $table->foreignId('id_materia')                // FK materia
                  ->constrained('materia')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('grupo');
    }
};
