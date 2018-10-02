<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TasksTable extends Migration
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
            $table->string('title');
            $table->text('task_content');
            $table->integer('status_id');
            $table->integer('priority_id');
            $table->integer('author_id');
            $table->integer('client_id');
            $table->integer('project_id');
            $table->integer('estimated_time');
            $table->integer('spent_time');
            $table->integer('billing_time');
            $table->timestamp('start_date');
            $table->timestamp('deadline_date');
            $table->float('fixed_rate');
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
        //
    }
}
