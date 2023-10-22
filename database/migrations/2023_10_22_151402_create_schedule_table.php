<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee')->cascadeOnDelete();
            $table->string('shift_id');
            $table->foreign('shift_id')->references('id')->on('shifts')->cascadeOnDelete();
            $table->string('attendance_id');
            $table->foreign('attendance_id')->references('id')->on('attendance')->cascadeOnDelete();
            $table->string('location_id');
            $table->foreign('location_id')->references('id')->on('location')->cascadeOnDelete();
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
        Schema::dropIfExists('schedule');
    }
}
