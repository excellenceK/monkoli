<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('niveauPriorite')->nullable();
            $table->dateTime('dateCreation')->default(Carbon::now());
            $table->dateTime('dateExpiration')->nullable();
            $table->string('status')->nullable();
            $table->string('typeAnnonce')->nullable();
            $table->string('condAge')->nullable();
            $table->integer('condAnneePermis')->nullable();
            $table->string('garCaution')->nullable();
            $table->integer('garMontantCaution')->nullable();
            $table->string('garPieceIdentite')->nullable();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('annonces');
    }
}
