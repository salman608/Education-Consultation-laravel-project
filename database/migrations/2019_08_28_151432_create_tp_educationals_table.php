<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpEducationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_educationals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('level_of_education', 100);
            $table->string('degree_title', 100);
            $table->string('group_name', 100);
            $table->string('institute_name', 100);
            $table->string('id_card_number', 100)->nullable();
            $table->string('result', 100);
            $table->string('year_of_passing', 100)->nullable();
            $table->string('curriculum', 100);
            $table->date('from_date');
            $table->date('until_date')->nullable();
            $table->enum('is_until', ['true', 'false']);
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
        Schema::dropIfExists('tp_educationals');
    }
}
