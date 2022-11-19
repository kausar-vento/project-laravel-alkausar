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
        Schema::create('produk_greens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('perusahaan');
            $table->unsignedBigInteger('green_id');
            $table->string('jenis_produk');
            $table->enum('kategori', ['Green', 'Yellow', 'Red']);
            $table->enum('tingkat_risiko', ['Rendah', 'Sedang', 'Tinggi']);
            $table->string('year_return');
            $table->string('total_aum');
            $table->integer('jatuh_tempo');
            $table->integer('min_pembelian_produk');
            $table->integer('biaya_pembelian');
            $table->integer('biaya_penjualan');
            $table->string('biaya_penampung');
            $table->timestamps();

            $table->foreign('green_id')->references('id')->on('greens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_greens');
    }
};
