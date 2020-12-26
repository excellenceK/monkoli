<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('typeVehicule')->nullable();
            $table->integer('nbrePlace')->nullable();
            $table->string('marque')->nullable();
            $table->string('model')->nullable();
            $table->date('anneeMiseEnCirculation')->nullable();
            $table->string('kilometrage')->nullable();
            $table->string('transmission')->nullable();
            $table->string('carburant')->nullable();
            $table->string('etat')->nullable();
            $table->integer('prixParJour')->nullable();
            $table->integer('avance')->nullable();
            $table->string('description')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
            $table->dateTime('dispoStart')->nullable();
            $table->dateTime('dispoEnd')->nullable();
            $table->integer('budgetClient')->nullable();
            $table->string('slugDisponibilite')->nullable();
            $table->string('slugChauffeur')->nullable();
            $table->string('slugGeneral')->nullable();
            $table->integer('annonce_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_vehicules');
    }
}
