<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->string('surname');
            $table->string('name');
            $table->boolean('gender');                  // 1 => male, 0 => female
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone_number')->nullable();

            $table->unsignedInteger('group_id')->nullable();
            $table->string('parent_surname')->nullable();
            $table->string('parent_name')->nullable();

            $table->boolean('is_trial')->default(1);
            $table->date('payment_date')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_fields');
    }
}
