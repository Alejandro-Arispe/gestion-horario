<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('correo', 100)->unique()->nullable();
            $table->boolean('activo')->default(true);
            $table->foreignId('id_rol')->constrained('rol');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
