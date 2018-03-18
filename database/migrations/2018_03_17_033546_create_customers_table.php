<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('sched_id',true);

            $table->integer('carsched_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('schedStartDate');
            $table->string('schedEndDate');
            $table->string('schedTime');
        });
        

            Schema::table('customers', function (Blueprint $table) {
          $table->foreign('carsched_id')->references('id')->on('car_schedules');
            $table->foreign('user_id')->references('user_id')->on('users');
        });

           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
