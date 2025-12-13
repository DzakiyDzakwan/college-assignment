<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asisten_labs', function (Blueprint $table) {
            $table->integer('aslab_id')->primary();
            $table->date('tanggal_pelantikan');
            $table->char('mahasiswa', 9)->nullable(false);
            $table->foreign('mahasiswa')->references('NIM')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asisten_labs');
    }
}
