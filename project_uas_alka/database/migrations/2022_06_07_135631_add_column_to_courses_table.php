<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('id_subcategory')->after('dipelajarin');
            $table->foreign('id_subcategory')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('id_admin')->after('id_subcategory');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('id_subcategory');
            $table->dropColumn('id_admin');
        });
    }
}
