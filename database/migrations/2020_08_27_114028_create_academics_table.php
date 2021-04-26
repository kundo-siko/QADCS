<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
			$table->string('employee_no')->unique();
			$table->string('grade9')->nullable();
			$table->string('grade9_PDF')->nullable();
			$table->string('grade12_')->nullable();
			$table->string('grade12_PDF')->nullable();
			$table->string('other')->nullable();
			$table->string('other_PDF')->nullable();
			$table->string('specify')->nullable();
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
        Schema::dropIfExists('academics');
    }
}
