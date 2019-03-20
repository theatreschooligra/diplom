<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('surname');
            $table->string('name');
            $table->boolean('gender');                  // 1 => male, 0 => female
            $table->string('address');
            $table->string('image')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('experience')->nullable();
            $table->string('profession')->nullable();
            $table->text('about')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers_fields');
    }
}
