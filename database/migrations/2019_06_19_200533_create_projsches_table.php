<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjschesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projsches', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned();
            $table->integer('TaskNumber')->nullable();
            $table->string('TaskName');
            $table->integer('DurationDays');
            $table->integer('Dependance1')->nullable();
            $table->integer('Dependance2')->nullable();
            $table->date('StartDate');
            $table->date('endDate');
            $table->enum('projschadulingStatus', array('waiting','Passive','Running', 'Finished'));
            $table->integer('isfinished')->default(0);
   
           

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
        Schema::dropIfExists('projsches');
    }
}
