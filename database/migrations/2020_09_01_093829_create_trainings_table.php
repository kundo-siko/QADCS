<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
			$table->string('employee_no');
			$table->string('course')->nullable();
			$table->string('stage')->nullable();
			$table->string('qualification')->nullable();
			$table->string('start')->nullable();
			$table->string('finish')->nullable();
			$table->string('institution')->nullable();
			$table->string('sponsor')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
