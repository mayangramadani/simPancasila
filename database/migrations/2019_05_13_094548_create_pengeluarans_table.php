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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId("JenisPengeluaranid")->nullable()->constrained("jenis_pengeluaran")->onDelete("cascade")->onUpdate("cascade");
            $table->string('jenis_pengeluaran');
            $table->date('tanggal_pengeluaran');
            $table->string('jumlah_pengeluaran');
            $table->string('bukti_pengeluaran');
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
        Schema::dropIfExists('pengeluaran');
    }
};
