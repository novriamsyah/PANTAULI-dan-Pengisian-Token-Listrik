<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArduinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arduinos', function (Blueprint $table) {
            $table->id();
            $table->float('tegangan');
            $table->float('arus');
            $table->float('pf');
            $table->float('pf_sudah');
            $table->float('dy_aktif');
            $table->float('dy_reaktif');
            $table->float('dy_semu');
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
        Schema::dropIfExists('arduinos');
    }
}
