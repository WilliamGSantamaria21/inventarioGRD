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
        Schema::create('actives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id'); 
            $table->foreign('area_id')->references('id')->on('subdomains')->where('id_domain', 1);
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('type_id'); 
            $table->foreign('type_id')->references('id')->on('subdomains')->where('id_domain', 2);
            $table->string('serial');
            $table->string('placaInt');
            $table->unsignedBigInteger('ubication_id'); 
            $table->foreign('ubication_id')->references('id')->on('subdomains')->where('id_domain', 3);
            $table->unsignedBigInteger('clasification_id'); 
            $table->foreign('clasification_id')->references('id')->on('subdomains')->where('id_domain', 12);
            $table->unsignedBigInteger('confidentiality_id'); 
            $table->foreign('confidentiality_id')->references('id')->on('subdomains')->where('id_domain', 4);
            $table->unsignedBigInteger('integrity_id'); 
            $table->foreign('integrity_id')->references('id')->on('subdomains')->where('id_domain', 5);
            $table->unsignedBigInteger('disponibility_id'); 
            $table->foreign('disponibility_id')->references('id')->on('subdomains')->where('id_domain', 6);
            $table->unsignedBigInteger('justification_id'); 
            $table->foreign('justification_id')->references('id')->on('subdomains')->where('id_domain', 7);
            $table->unsignedBigInteger('access_id'); 
            $table->foreign('access_id')->references('id')->on('subdomains')->where('id_domain', 9);
            $table->date('dateAdmission');
            $table->date('departureDate');
            $table->unsignedBigInteger('status_id'); 
            $table->foreign('status_id')->references('id')->on('subdomains')->where('id_domain', 10);
            $table->unsignedBigInteger('actuali_id'); 
            $table->foreign('actuali_id')->references('id')->on('subdomains')->where('id_domain', 11);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actives');
    }
};
