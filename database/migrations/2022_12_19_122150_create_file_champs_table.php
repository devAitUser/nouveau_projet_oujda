<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileChampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_champs', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('name_file');
            $table->unsignedBigInteger('champs_id')->nullable();
            $table->foreign('champs_id')->references('id')->on('attributs_dossiers')->onDelete('cascade');
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
        Schema::dropIfExists('file_champs');
    }
}
