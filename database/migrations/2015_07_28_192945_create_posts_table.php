<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('headline');
            $table->integer('source_id')->unsigned()->nullable();
            $table->foreign('source_id')->references('id')->on('sources');
            $table->string('staff')->nullable();
            $table->string('writer_collaborator')->nullable();
            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->text('notes')->nullable();
            $table->date('publish_date')->nullable();
            $table->string('attachment')->nullable();
            $table->string('url')->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->boolean('media_mention');
            $table->boolean('presentation');
            $table->boolean('meeting');
            $table->boolean('testimonial');
            $table->boolean('sponsored_event');
            $table->boolean('development');
            $table->boolean('on_campus_collaboration');
            $table->boolean('off_campus_collaboration');
            $table->boolean('achievement');
            $table->boolean('satifaction_survey');
            $table->boolean('other');
            $table->text('other_desc')->nullable();
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
        Schema::drop('posts');
    }
}
