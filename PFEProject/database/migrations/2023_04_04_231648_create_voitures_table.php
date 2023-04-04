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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->integer('annee');
            $table->string('carburant');
            $table->string('transmission');
            $table->integer('kilometrage');
            $table->integer('puissance_fiscale');
            $table->string('dedouanee');
            $table->string('premiere_main');
            $table->string('image');
            $table->unsignedBigInteger('id_modele');
            $table->foreign('id_modele')->references('id')->on('modeles');
            $table->unsignedBigInteger('id_marque');
            $table->foreign('id_marque')->references('id')->on('marques');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
