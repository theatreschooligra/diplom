<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('group_id');
            $table->date('lesson_date');
            $table->unsignedInteger('lesson_time');
            $table->unsignedInteger('room');
            $table->unsignedInteger('teacher_id');
            $table->integer('homework_id')->unsigned()->nullable();
            $table->dateTime('homework_send_time')->nullable();
            $table->boolean('bonus1')->default(0);
            $table->boolean('bonus2')->default(0);
            $table->boolean('fine1')->default(0);
            $table->boolean('fine2')->default(0);
            $table->timestamps();

            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('teacher_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('homework_id')
                ->references('id')->on('homeworks')
                ->onDelete('set null')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
