<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('titre')->nullable();
            $table->text('description');
            $table->dateTime('date_expiration')->nullable();
            $table->integer('pieces_jointe_id')->nullable();
            $table->integer('publicationable_id');
            $table->string('publicationable_type');
            $table->integer('user_id');
            $table->string('ferme')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('publications');
    }
}
