<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->integer('roll_no');
            $table->string('student_name');
            $table->unsignedBigInteger('department_id');
            $table->text('address');
            $table->unsignedBigInteger('gender_id');
            $table->timestamps();
            $table->foreign('department_id')->references('department_id')->on('department');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
