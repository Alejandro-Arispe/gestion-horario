<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('docente', function (Blueprint $table) {
            $table->id('id_docente');                     // PK
            $table->string('ci', 15)->unique();           // CI único
            $table->string('nombre_completo', 120);
            $table->string('correo', 100)->unique();
            $table->string('telefono', 20)->nullable();
            $table->enum('sexo', ['M', 'F'])->nullable();
            $table->boolean('activo')->default(true);
            $table->foreignId('id_facultad')              // FK facultad
                  ->constrained('facultad');
        });
    }

    public function down(): void {
        Schema::dropIfExists('docente');
    }
};
