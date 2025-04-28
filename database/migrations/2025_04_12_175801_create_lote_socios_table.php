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
        Schema::create('lote_socios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->constrained('lotes')->onDelete('cascade');
            $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade');
            $table->string('tipo_participacion')->nullable(); // propietario, arrendatario, etc.
            $table->decimal('porcentaje_participacion', 5, 2)->nullable(); // por ejemplo, 50.00
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lote_socios');
    }
};
