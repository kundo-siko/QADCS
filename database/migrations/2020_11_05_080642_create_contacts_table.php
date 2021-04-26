<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
			$table->string('employee_no')->nullable();
			$table->string('surname')->nullable();
			$table->string('other_names')->nullable();
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
			$table->string('department')->nullable();
			$table->string('job_spec')->nullable();
			$table->string('job_title')->nullable();	
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
        Schema::dropIfExists('contacts');
    }
}
