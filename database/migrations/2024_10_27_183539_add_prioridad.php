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
        // Añade columna de prioridad
        Schema::table('comments', function (Blueprint $table) {
            $table -> string('prioridad') -> after('comentario_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Para rollback
        Schema::table('comments', function (Blueprint $table) {
            $table -> dropColumn('prioridad');
        });
    }
};
