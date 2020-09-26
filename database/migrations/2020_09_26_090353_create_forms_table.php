<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('number')->nullable();
            $table->string('password')->nullable();
            $table->string('select')->nullable();
            $table->string('multi_select')->nullable();
            $table->text('textarea')->nullable();
            $table->string('radio')->nullable();
            $table->string('checkbox')->nullable();
            $table->string('color')->nullable();
            $table->string('date')->nullable();
            $table->string('local_date')->nullable();
            $table->string('month')->nullable();
            $table->string('file')->nullable();
            $table->string('time')->nullable();
            $table->string('week')->nullable();
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
        Schema::dropIfExists('forms');
    }
}
