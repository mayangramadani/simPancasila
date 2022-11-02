<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sekolah_id")->nullable()->constrained("sekolah")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("users_id")->nullable()->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->string('nama_siswa')->nullable();
            $table->string('nis')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->integer('kelurahan')->nullable();
            $table->integer('kecamatan')->nullable();
            $table->integer('kota')->nullable();
            $table->integer('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('agama')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('foto')->nullable();
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->boolean('isActive')->nullable();
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
        Schema::dropIfExists('siswa');
    }
};
