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
        Schema::create('ajuste_aportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aporte_id')->constrained('aportes')->onDelete('cascade');
            $table->enum('tipo', ['multa', 'descuento']);
            $table->decimal('monto_aplicado', 10, 2);
            $table->date('fecha_aplicacion');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajuste_aportes');
    }
};
