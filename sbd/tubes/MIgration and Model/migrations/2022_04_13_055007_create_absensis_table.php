<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->bigIncrements('absensi_id');
            $table->enum('status', ['hadir', 'terlambat', 'absen']);
            $table->char('mahasiswa', 9)->nullable(false);
            $table->foreign('mahasiswa')->references('NIM')->on('mahasiswas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('pertemuan')->unsigned()->nullable(false);
            $table->foreign('pertemuan')->references('pertemuan_id')->on('pertemuans')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('absensis');
    }
}
