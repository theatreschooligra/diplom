<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->date('month');
            $table->unsignedInteger('KPI1')->default(0);
            $table->unsignedInteger('KPI2')->default(0);
            $table->unsignedInteger('KPI3')->default(0);
            $table->unsignedInteger('bonus1')->default(0);
            $table->unsignedInteger('bonus2')->default(0);
            $table->unsignedInteger('bonus3')->default(0);
            $table->unsignedInteger('total')->default(0);
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
        Schema::dropIfExists('salaries');
    }
}
