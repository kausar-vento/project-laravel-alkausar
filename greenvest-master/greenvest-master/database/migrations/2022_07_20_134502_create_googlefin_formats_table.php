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
        Schema::create('googlefin_formats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_green_id');
            $table->BigInteger('pre_close');
            $table->BigInteger('market_cap');
            $table->BigInteger('div_yield');

            $table->timestamps();

            $table->foreign('produk_green_id')->references('id')->on('produk_greens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('googlefin_formats');
    }
};
