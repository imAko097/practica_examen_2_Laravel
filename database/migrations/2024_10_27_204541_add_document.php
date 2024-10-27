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
            $table -> text('archivo') -> nullable() -> after('comentario_usuario'); // text -> texto largo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropea la columna en caso de rollback
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('archivo'); // elimina la columna imagen_url
        });
    }
};
