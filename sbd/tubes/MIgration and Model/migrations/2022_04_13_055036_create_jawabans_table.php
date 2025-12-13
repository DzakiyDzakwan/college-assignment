<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->bigIncrements('jawaban_id');
            $table->string('nama_tugas', 200);
            $table->bigInteger('tugas')->unsigned()->nullable(false);
            $table->foreign('tugas')->references('tugas_id')->on('tugas');
            $table->char('mahasiswa', 9)->nullable(false);
            $table->foreign('mahasiswa')->references('NIM')->on('mahasiswas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('nilai')->unsigned();
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
        Schema::dropIfExists('jawabans');
    }
}
