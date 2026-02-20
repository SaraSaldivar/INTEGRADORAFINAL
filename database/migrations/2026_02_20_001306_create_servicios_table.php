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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('precio', 10, 2);
            $table->string('descripcion');
            $table->boolean('activo')->default(true);
            $table->string('imagen');
            $table->integer('tiempo_estimado');
            $table->foreignId('tipo_servicio_id')->constrained('tipo_servicio')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
