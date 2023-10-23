<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_groups', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee')->cascadeOnDelete();
            $table->string('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('company')->cascadeOnDelete();
            $table->string('group_head_id')->nullable();
            $table->foreign('group_head_id')->references('id')->on('employee')->cascadeOnDelete();
            $table->unsignedBigInteger('sub_group_id')->nullable();
            $table->foreign('sub_group_id')->references('id')->on('sub_groups')->cascadeOnDelete();
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
        Schema::dropIfExists('company_groups');
    }
}
