<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('prenom')->nullable();
            $table->string('genre')->nullable();
            $table->string('telephone')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('complementAdresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('codePostal')->nullable();
            $table->string('pays')->nullable();
            $table->string('description')->nullable();
            $table->string('typeCompte')->nullable();
            $table->string('idEntreprise')->nullable();
            $table->string('nomEntreprise')->nullable();
            $table->string('paysDomiciliation')->nullable();
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
