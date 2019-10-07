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
            $table->integer('char_counts')->nullable();
            $table->text('note')->nullable();
            $table->integer('company_id')->unsigned()->index();
            $table->integer('staff_id')->unsigned()->index();
            $table->integer('price')->nullable();
            $table->integer('billing_status_id')->unsigned()->index();
            $table->string('billing_id')->nullable();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('billing_status_id')->references('id')->on('billing_statuses');
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
