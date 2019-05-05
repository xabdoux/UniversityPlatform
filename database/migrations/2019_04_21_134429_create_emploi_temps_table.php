<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploiTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emploi_temps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('fichier');
            $table->string('anne_universitaire');
            $table->string('session');
            $table->integer('enseignant_id');
            $table->integer('admin_id');

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
        Schema::dropIfExists('emploi_temps');
    }
}
