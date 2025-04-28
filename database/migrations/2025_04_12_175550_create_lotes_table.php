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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_lote')->unique();
            $table->text('ubicacion');
            $table->decimal('hectaria', 10, 2);
            $table->decimal('valor_estimado', 12, 2)->nullable();
            $table->date('fecha_asociacion');
            $table->enum('estado', ['activo', 'inactivo', 'en disputa'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
