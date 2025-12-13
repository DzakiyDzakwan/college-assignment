<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->char('kelas_id', 6)->primary();
            $table->char('kelas', 5);
            $table->char('dosen');
            $table->foreign('dosen')->references('NIP')->on('dosens');
            $table->char('mata_kuliah', 6)->nullable(false);
            $table->foreign('mata_kuliah')->references('kode_mata_kuliah')->on('mata_kuliahs')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('kelas');
    }
}
