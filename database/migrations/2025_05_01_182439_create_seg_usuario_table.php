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
        Schema::create('seg_usuario', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('usuarioImagen', 255)->nullable()->default(null);
            $table->string('usuarioAlias', 75)->nullable()->default(null);
            $table->string('usuarioPassword', 255)->nullable()->default(null);
            $table->string('usuarioNombre', 255)->nullable()->default(null);
            $table->string('usuarioEmail', 255)->nullable()->default(null);
            $table->enum('usuarioEstado', ['Activo', 'Inactivo'])->nullable()->default(null);
            $table->boolean('usuarioConectado')->nullable()->default(null);
            $table->datetime('usuarioUltimaConexion')->nullable()->default(null);
            $table->string('usuarioCodigoRecuperacion', 255)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seg_usuario');
    }
};
