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
        Schema::create('google_finances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_green_id');
            $table->string('ticker');
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
        Schema::dropIfExists('google_finances');
    }
};
