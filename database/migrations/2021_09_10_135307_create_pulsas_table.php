<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePulsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulsas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_langgan');
            $table->string('no_hp_langgan');
            $table->string('alamat_langgan');
            $table->integer('jml_pulsa');
            $table->bigInteger('harga_paket');
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
        Schema::dropIfExists('pulsas');
    }
}
