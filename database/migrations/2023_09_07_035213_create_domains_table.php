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
        Schema::create('domains', function (Blueprint $table) {
            $table->id(); // Campo 'id' autoincremental
            $table->string('description'); // Campo 'description' de tipo cadena (puedes ajustar el tipo según tus necesidades)
            $table->timestamps(); // Campos 'created_at' y 'updated_at' para el control de tiempo
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
