<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('aula', function (Blueprint $table) {
            $table->id('id_aula');                         // PK
            $table->string('codigo', 20)->unique();         // Código aula
            $table->integer('capacidad')->default(0);
            $table->string('ubicacion', 100)->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('aula');
    }
};
