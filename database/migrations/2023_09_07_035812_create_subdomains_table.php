<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('subdomains', function (Blueprint $table) {
            $table->id(); // Campo 'id' autoincremental
            $table->unsignedBigInteger('id_domain'); // Clave foránea a la tabla 'domains'
            $table->string('description'); // Campo 'description'
            $table->timestamps(); // Campos 'created_at' y 'updated_at' para el control de tiempo
    
            // Se define la llave foránea y se referencia con su dominio
            $table->foreign('id_domain')->references('id')->on('domains');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subdomains');
    }
};
