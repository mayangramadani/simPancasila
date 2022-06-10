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
        Schema::create('pembayaran_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("siswa_id");
            $table->string('Jenis_pembayaran');
            $table->string('jumlah_pembayaran');
            $table->string('tanggal_pembayaran');
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
        Schema::dropIfExists('pembayaran_siswas');
    }
};
