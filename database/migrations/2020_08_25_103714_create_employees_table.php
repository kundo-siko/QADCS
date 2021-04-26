<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
			$table->string('employee_no')->unique();
			$table->string('ae_number')->unique();
			$table->string('surname');
			$table->string('other_names');
			$table->string('salary_scale');
			$table->string('sex');
			$table->string('DOB');
			$table->string('NRC');
			$table->string('email');
			$table->string('file_number');
			$table->string('nationality');
			$table->string('ministry');
			$table->string('department');
			$table->string('district');
			$table->string('province');
			$table->string('appointment');
			$table->string('substantive');
			$table->string('job');
			$table->string('confirmation');
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
        Schema::dropIfExists('employees');
    }
}
