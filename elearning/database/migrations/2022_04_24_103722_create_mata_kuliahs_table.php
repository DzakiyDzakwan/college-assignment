<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->char('kode_mata_kuliah', 6)->nullable(false)->primary();
            $table->string('nama_matkul', 200);
            $table->integer('sks')->unsigned();
            $table->char('jurusan', 6)->nullable(false);
            $table->foreign('jurusan')->references('kode_jurusan')->on('jurusans')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('mata_kuliahs');
    }
}
