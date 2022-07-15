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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("PembayaranSiswaid")->nullable()->constrained("pembayaran_siswas")->onDelete("cascade")->onUpdate("cascade");
            $table->string('jenis_pemasukan');
            $table->string('tanggal_pemasukan');
            $table->string('jumlah_pemasukan');
            $table->string('total');
            $table->string('bukti_pemasukan');
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
        Schema::dropIfExists('pemasukan');
    }
};
