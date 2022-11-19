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
        Schema::create('list_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produk_green_id');
            $table->unsignedBigInteger('bank_id');
            $table->String('pesan');
            $table->Integer('total_bayar');
            $table->String('jenis_transaksi');
            $table->enum('status', ['Selesai', 'Pending', 'Menunggu Pembayaran', 'Dibatalkan', 'Terjual']);
            $table->String('kode_transaksi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produk_green_id')->references('id')->on('produk_greens')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_transaksis');
    }
};
