<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatericoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matericourses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_materi');
            $table->text('deskripsi')->nullable();
            $table->string('link_yt')->nullable();
            $table->string('dokumen_pdf')->nullable();
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
        Schema::dropIfExists('matericourses');
    }
}
