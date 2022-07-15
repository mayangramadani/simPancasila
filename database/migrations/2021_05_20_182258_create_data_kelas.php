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
        Schema::create('data_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sekolah_id")->nullable()->constrained("sekolah")->onDelete("cascade")->onUpdate("cascade");
            $table->string('nama_kelas');
            $table->string('tingkatan_kelas');
            $table->string('kuota');
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
        Schema::dropIfExists('data_kelas');
    }
};
