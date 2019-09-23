<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned()->index();
            $table->string('name');
            $table->integer('status_id')->unsigned()->index();
            $table->date('period');
            $table->integer('char_counts');
            $table->text('note')->nullable();
            $table->timestamps();
            
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}