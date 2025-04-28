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
        Schema::create('archivos_socios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade');
            
            $table->string('nombre_archivo'); // Nombre visible
            $table->string('ruta'); // Ruta del archivo en el sistema o storage
            $table->string('tipo')->nullable(); // Tipo de archivo (PDF, JPG, etc.)
            $table->text('descripcion')->nullable(); // Descripción opcional

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos_socios');
    }
};
