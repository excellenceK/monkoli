<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationAppartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_appartements', function (Blueprint $table) {
            $table->id();
            $table->string('typeResidence')->nullable();
            $table->integer('nbrePiece')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('quartier')->nullable();
            $table->string('autrePrecision')->nullable();
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
        Schema::dropIfExists('location_appartements');
    }
}
