<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_colis', function (Blueprint $table) {
            $table->id();
            $table->string('typeTransport')->nullable();
            $table->string('moyenTransport')->nullable();
            $table->string('compagnieTransport')->nullable();
            $table->string('villeDepart')->nullable();
            $table->string('villeArriver')->nullable();
            $table->date('dateDepart')->nullable();
            $table->date('dateArriver')->nullable();
            $table->string('verificationBillet')->nullable();
            $table->string('unite')->nullable();
            $table->integer('quantiteDisponible')->nullable();
            $table->integer('minimunReservation')->nullable();
            $table->dateTime('dateLimiteReservation')->nullable();
            $table->string('lieuDepot')->nullable();
            $table->string('lieuLivraison')->nullable();
            $table->string('devise')->nullable();
            $table->integer('prixUnitaire')->nullable();
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
        Schema::dropIfExists('transport_colis');
    }
}
