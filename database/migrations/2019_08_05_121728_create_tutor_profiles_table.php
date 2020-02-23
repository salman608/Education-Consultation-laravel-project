<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('phone', 15)->unique();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('locations_id')->nullable();
            $table->enum('have_experience', ['Yes','No'])->default('No');
            $table->string('experience', 100)->nullable();
            $table->string('from_time', 20)->nullable();
            $table->string('to_time', 20)->nullable();
            $table->double('salary', 10,2)->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('additional_numbers', 20)->nullable();
            $table->string('identity', 50)->nullable();
            $table->string('facebook_link', 100)->nullable();
            $table->string('linkedin_link', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('father_mobile_no', 20)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('mother_mobile_no', 20)->nullable();
            $table->string('emergency_name', 100)->nullable();
            $table->string('emergency_mobile_no', 20)->nullable();
            $table->string('emergency_relation', 50)->nullable();
            $table->text('emergency_address')->nullable();
            $table->string('photo', 100)->nullable();
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
        Schema::dropIfExists('tutor_profiles');
    }
}
