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
            $table->foreignId("Siswaid")->nullable()->constrained("Users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("JenisPembayaranid")->nullable()->constrained("jenis_pembayaran")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("Userid")->nullable()->constrained("Users")->onDelete("cascade")->onUpdate("cascade");
            $table->string('Jenis_pembayaran');
            $table->string('bulan_pembayaran');
            $table->string('jumlah_pembayaran');
            $table->string('bukti_pembayaran');
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
