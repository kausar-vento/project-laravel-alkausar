<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('judul_course');
            $table->text('deskripsi');
            $table->text('requirement');
            $table->text('dipelajarin');
            $table->string('level');
            $table->text('tujuan');
            $table->string('thumbnail');
            $table->string('top_course');
            $table->integer('harga_langganan');
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
        Schema::dropIfExists('courses');
    }
}
