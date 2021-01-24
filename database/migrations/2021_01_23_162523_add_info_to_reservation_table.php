<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
            $table->boolean('accepter')->nullable();
            $table->boolean('recuperer')->nullable();
            $table->boolean('livrer')->nullable();
            $table->integer('codeDepot')->nullable();
            $table->integer('codeRetrait')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
            $table->dropColumn(['accepter', 'recuperer', 'livrer', 'codeDepot', 'codeRetrait']);
        });
    }
}
