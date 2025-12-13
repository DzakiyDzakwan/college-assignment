<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->char('NIM', 9)->nullable(false)->primary();
            $table->char('NISN')->nullable(false)->unique();
            $table->char('semester')->nullable(false);
            $table->char('program')->nullable(false);
            $table->year('angkatan')->nullable(false);
            $table->enum('status', ['aktif','inactive'])->nullable(false);  
            $table->char('user')->nullable(false);
            $table->foreign('user')->references('NIK')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('mahasiswas');
    }
}
