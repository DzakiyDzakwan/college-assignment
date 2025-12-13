<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->char("kode_jurusan", 6)->nullable(false)->primary();
            $table->string('nama_jurusan')->nullable(false);
            $table->char('degree', 2)->nullable(false);
            $table->char('fakultas_id', 6)->nullable(false);
            $table->foreign('fakultas_id')->references('kode_fakultas')->on('fakultas')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('jurusans');
    }
}
