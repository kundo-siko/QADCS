<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_records', function (Blueprint $table) {
            $table->id();
			$table->string('employee_no');
			$table->string('position')->nullable();
			$table->string('appointment_date')->nullable();
			$table->string('appointment_status')->nullable();
			$table->string('appointment_type')->nullable();
			$table->string('duration')->nullable();
			$table->string('section')->nullable();
			$table->string('department')->nullable();
			$table->string('ministry')->nullable();
			$table->string('station')->nullable();
			$table->string('district')->nullable();
			$table->string('province')->nullable();
			$table->string('recent_payslip')->nullable();
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
        Schema::dropIfExists('employment_records');
    }
}
