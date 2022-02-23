<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesOffered extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_offered', function (Blueprint $table) {
            $table->id();
            $table->string('language',3);
            $table->string('services');
            $table->timestamps();
        });

        Schema::create('professional_interests', function (Blueprint $table) {
            $table->id();
            $table->string('language',3);
            $table->string('professional_interests');
            $table->timestamps();
        });

        Schema::create('information_about_the_programmer', function (Blueprint $table) {
            $table->id();
            $table->string('language',3);
            $table->string('gender_of_the_person',6);
            $table->date('date_of_birth');
            $table->string('city_of_residence',50);
            $table->string('country_of_residence',50);
            $table->string('phone',14);
            $table->string('email',100);
            $table->string('photo', 200);
            $table->timestamps();
        });

        Schema::create('links_to_programmer_resources', function (Blueprint $table) {
            $table->id();
            $table->string('resource_name',200);
            $table->string('host');
            $table->timestamps();
        });

        Schema::create('key_skill_variables', function (Blueprint $table) {
            $table->id();
            $table->float('theory_weighting_factor');
            $table->float('practice_weight_ratio');
            $table->float('new_discoveries_weighting_factor');
            $table->integer('maximum_number_of_projects');
            $table->integer('maximum_number_of_new_discoveries');
            $table->timestamps();
        });

        Schema::create('key_skill', function (Blueprint $table) {
            $table->id();
            $table->string('skill', 255);
            $table->integer('percentage_of_theory_study');
            $table->integer('number_of_practice');
            $table->integer('number_of_discoveries');
            $table->timestamps();
        });

        Schema::create('information_about_education', function (Blueprint $table) {
            $table->id();
            $table->string('language', 3);
            $table->string('name_of_organization', 255);
            $table->date('date_of_receipt_of_the_document');
            $table->string('name_of_the_faculty', 255);
            $table->string('name_of_the_specialty', 255);
            $table->timestamps();
        });

        Schema::create('information_about_courses', function (Blueprint $table) {
            $table->id();
            $table->string('language', 3);
            $table->string('name_of_organization', 255);
            $table->date('date_of_receipt_of_the_document');
            $table->string('name_of_the_course', 255);
            $table->timestamps();
        });

        Schema::create('work_experience', function (Blueprint $table) {
            $table->id();
            $table->string('language', 3);
            $table->date('begin_of_work');
            $table->date('end_of_work');
            $table->string('name_of_the_organization', 255);
            $table->string('current_position', 255);
            $table->text('functions_performed');
            $table->timestamps();
        });

        Schema::create('completed_projects', function (Blueprint $table) {
            $table->id();
            $table->string('language', 3);
            $table->string('name_of_project');
            $table->text('purpose_of_project');
            $table->text('applied_technologies');
            $table->date('begin_of_project');
            $table->date('end_of_project');
            $table->string('link_to_github');
            $table->string('screenshot_of_the_start_page',200)->nullable();
            $table->string('screenshot_of_a_special_page',200)->nullable();
            $table->timestamps();
        });

        Schema::create('site_visit_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_page');
            $table->integer('number_of_visits');
            $table->timestamps();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('introduce_yourself');
            $table->string('email');
            $table->text('text_of_message');
            $table->timestamps();
        });

        Schema::create('authentication', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('password', 255);
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
        Schema::dropIfExists('services_offered');
        Schema::dropIfExists('professional_interests');
        Schema::dropIfExists('information_about_the_programmer');
        Schema::dropIfExists('links_to_programmer_resources');
        Schema::dropIfExists('key_skill_variables');
        Schema::dropIfExists('key_skill');
        Schema::dropIfExists('information_about_education');
        Schema::dropIfExists('work_experience');
        Schema::dropIfExists('completed_project');
        Schema::dropIfExists('site_visit_statistics');
        Schema::dropIfExists('authentication');
    }
}
