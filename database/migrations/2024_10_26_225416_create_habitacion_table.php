<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('habitacion', function (Blueprint $table) {
            $table->id();
            $table->double('precio_noche');
            $table->boolean('estado');
            $table->integer('capacidad_personas');
            $table->json('servicios');
            $table->integer('numero_camas');
            $table->string('tipo_cama');
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('habitacion');
    }
};
