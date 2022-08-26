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
            $table->foreignId("kategori_keuangan_id")->nullable()->constrained("kategori_keuangan")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("users_id")->nullable()->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->string('nama_keuangan')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('bukti')->nullable();
            $table->enum('status_pembayaran',['Lunas','Belum Lunas','Tolak','Proses'])->nullable()->default('Belum Lunas');
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