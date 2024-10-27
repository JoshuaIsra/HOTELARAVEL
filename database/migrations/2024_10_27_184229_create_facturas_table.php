<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('idFactura');
            $table->foreignId('reserva_id')->constrained('reservas')->onDelete('cascade'); // Relación con reserva
            $table->date('fechaEmision'); // Fecha de emisión de la factura
            $table->decimal('montoTotal', 8, 2); // Monto total de la factura
            $table->string('metodoPago'); // Método de pago utilizado
            $table->string('estadoPago')->default('pendiente'); // Estado del pago (pendiente, pagado)
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
