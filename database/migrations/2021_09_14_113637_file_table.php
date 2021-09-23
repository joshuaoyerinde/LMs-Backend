<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('course_file_table', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->bigInteger('course_id')->unsigned();
            // $table->bigInteger('admin_id')->unsigned();
            $table->timestamps();
            // from admin reg_table.....
            $table->foreign('course_id')->references('id')->on('courses_tables')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('course_file_table');
    }
}
