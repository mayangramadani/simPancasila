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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id');
            $table->foreignId('transaksi_id');
            $table->string('payment_method');
            $table->decimal('amount', 11, 2);
            $table->decimal('amount_verify', 11, 2)->nullable();
            $table->string('for_month');
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->string('status');
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('is_expired')->nullable();
            $table->foreignId('users_id')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
};
