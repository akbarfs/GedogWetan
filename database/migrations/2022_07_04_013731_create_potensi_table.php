<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potensi', function (Blueprint $table) {
            $table->bigIncrements('id_potensi');
            $table->String('potensi',100) ->nullable();
            $table->String('deskripsi',100) ->nullable();
            $table->String('gambar',100) ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('potensi');
    }
}
