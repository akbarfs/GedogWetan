<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nama',50) ->nullable();
            $table->String('foto',155) ->nullable();
            //membuat FK dari id_jabatan
            $table->unsignedInteger('id_jabatan');
            $table->unsignedInteger('id_organisasi');
            $table->timestamps();
            //...
            $table->foreign('id_jabatan')
            ->reference('id')
            ->on('jabatan')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_organisasi')->reference('id')
            ->on('organisasi')
            ->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengurus');
    }
}
