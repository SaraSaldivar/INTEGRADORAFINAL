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
    Schema::create('auditoria', function (Blueprint $table) {
            $table->id();
            $table->string('tabla_afectada', 50); 
            $table->enum('operacion', ['INSERT', 'UPDATE', 'DELETE']);
            $table->integer('id_registro_afectado'); 
            $table->string('valor_anterior', 255)->nullable();
            $table->string('valor_nuevo', 255)->nullable();
            $table->integer('user_id')->nullable(); 
            $table->timestamp('fecha_hora')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
