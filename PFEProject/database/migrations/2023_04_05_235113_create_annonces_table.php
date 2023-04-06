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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->float('prix');
            $table->date('date_creation');
            $table->binary('miniature');
            $table->boolean('etat')->default(false);
            $table->unsignedBigInteger('id_utilisateur');
            $table->foreign('id_utilisateur')->references('id')->on('users');
            $table->unsignedBigInteger('id_voiture');
            $table->foreign('id_voiture')->references('id')->on('voitures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
