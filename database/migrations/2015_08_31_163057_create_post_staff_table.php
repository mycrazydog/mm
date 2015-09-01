<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post_staff', function ($table) {
            $table->integer('post_id');
            $table->integer('staff_id');                      
        });
        
        //
        Schema::create('staff', function ($table) {
			$table->increments('id')->unsigned();
			$table->string('first_name');   
			$table->string('last_name');          
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
        Schema::drop('post_staff');
        //
        Schema::drop('staff');
    }
}
