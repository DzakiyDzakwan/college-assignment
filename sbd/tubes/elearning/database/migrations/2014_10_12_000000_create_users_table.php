<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// kalo bingung sama tipe2nya bisa liat di
// https://laravel.com/docs/9.x/migrations#available-column-types

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('NIK')->unique();
            $table->string('email')->nullable(false)->unique();
            $table->char('nomor_hp')->unique();
            $table->string('first_name', 200)->nullable(false);
            $table->string('last_name', 200);
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('agama', 100);
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('alamat')->nullable(false);
            $table->date('tgl_lahir');
            $table->string('password', 200)->nullable(false);
            $table->enum('status', ['mahasiswa','dosen','admin']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
