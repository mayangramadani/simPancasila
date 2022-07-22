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
        Schema::create('transaksi_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId("siswa_id")->nullable()->constrained("siswa")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("kategori_pembayaran_id")->nullable()->constrained("kategori_pembayaran")->onDelete("cascade")->onUpdate("cascade");
            $table->string('bulan_pembayaran')->nullable();
            $table->string('jumlah_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
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
        Schema::dropIfExists('transaksi_pembayaran');
    }
};
