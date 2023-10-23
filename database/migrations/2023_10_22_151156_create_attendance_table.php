<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee')->cascadeOnDelete();
            $table->string('fault_id')->nullable();
            $table->foreign('fault_id')->references('id')->on('attendance_faults')->cascadeOnDelete();
            $table->dateTime('check_in');
            $table->dateTime('check_out');
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
        Schema::dropIfExists('attendance');
    }
}
