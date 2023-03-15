<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reg_id');
            $table->string('course_name')->nullable();
            $table->string('subject')->nullable();
            $table->string('doctors_name')->nullable();
            $table->string('bmdc_no')->nullable();
            $table->string('medical_college')->nullable();
            $table->string('session')->nullable();
            $table->string('job_description')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('fathers_profession')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mothers_profession')->nullable();
            $table->string('sopuse_name')->nullable();
            $table->string('spouse_profession')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('important_contact')->nullable();
            $table->string('relation')->nullable();
            $table->text('mailing_address')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('result_name')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('education_board')->nullable();
            $table->string('mbbs_institute_name')->nullable();
            $table->string('mbbs_result_name')->nullable();
            $table->string('mbbs_passing_year')->nullable();
            $table->string('mbbs_education_board')->nullable();
            $table->string('fcps_institute_name')->nullable();
            $table->string('fcps_result_name')->nullable();
            $table->string('fcps_passing_year')->nullable();
            $table->string('fcps_education_board')->nullable();
            $table->json('hearing_source')->nullable();
            $table->integer('enrolled_courses')->nullable();
            $table->integer('join')->nullable();
            $table->string('photo')->nullable();
            $table->integer('is_agree')->nullable();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
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
        Schema::dropIfExists('application_details');
    }
}
