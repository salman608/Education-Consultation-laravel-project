<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobboards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('categories_id');
            $table->unsignedInteger('courses_id');
            $table->string('curriculum', 100)->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('locations_id');
            $table->double('salary', 10,2);
            $table->integer('no_of_students');
            $table->string('institute_name', 100);
            $table->string('student_gender', 10);
            $table->string('peferred_gender', 10);
            $table->integer('weekly');
            $table->text('requirements')->nullable();
            $table->date('hire_date');
            $table->string('tutoring_time', 20);
            $table->enum('is_published', ['reviewing','published', 'completed']);
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
        Schema::dropIfExists('jobboards');
    }
}
