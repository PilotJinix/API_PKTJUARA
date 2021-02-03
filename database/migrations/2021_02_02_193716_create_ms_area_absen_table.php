<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsAreaAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_area_absen', function (Blueprint $table) {
            $table->bigIncrements('id_area');
            $table->string('kode_area');
            $table->string('nama_area');
            $table->string('lat');
            $table->string('lng');
            $table->string('radius');
            $table->string('created_by');
            $table->string('created_on');
            $table->string('updated_by');
            $table->string('updated_on');

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
        Schema::dropIfExists('ms_area_absen');
    }
}
