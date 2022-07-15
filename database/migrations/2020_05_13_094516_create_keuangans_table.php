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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("JenisKeuanganid")->nullable()->constrained("jenis_keuangan")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("Saldoid")->nullable()->constrained("saldo")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("Usersid")->nullable()->constrained("Users")->onDelete("cascade")->onUpdate("cascade");
            $table->string('nama_keuangan');
            $table->string('jenis_keuangan');
            $table->string('jumlah');
            $table->string('tanggal');
            $table->string('deskripsi');
            $table->string('bukti');
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
        Schema::dropIfExists('keuangan');
    }
};
