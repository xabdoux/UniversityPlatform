<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('couverture')->nullable();
            $table->string('cin')->nullable();
            $table->integer('cne')->nullable();
            $table->string('tel')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->integer('code_postal')->nullable();
            $table->text('biographie')->nullable();
            $table->date('date_naiss')->nullable();
            $table->text('adresse')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
