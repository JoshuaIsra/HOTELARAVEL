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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            // $table->date('fecha_reserva');
            $table->date('fecha_reserva')->default('2024-01-01'); // Cambia '2024-01-01' por una fecha que tenga sentido
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade'); // Relación con cliente
            $table->foreignId('habitacion_id')->constrained('habitacion')->onDelete('cascade'); // Relación con habitación
            $table->string('estadoReserva')->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
