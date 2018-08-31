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
            $table->integer('project_id');
            $table->integer('create_by'); // user id
            $table->integer('create_for');  // user id
            $table->integer('task_file_id'); // file path
            $table->string('name');
            $table->text('description');
            $table->boolean('complete')->default(0);
            $table->timestamps();
        });


        // Task file table 
        Schema::create('task_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->string('file_path'); // file path
            $table->timestamps();
        }); 


        // pivot task and file relationship
        Schema::create('task_task_file', function (Blueprint $table) {
            $table->integer('task_id')->unsigned();
            $table->integer('task_file_id')->unsigned();

             $table->foreign('task_id')->references('id')->on('tasks')
                ->onUpdate('cascade')->onDelete('cascade');

             $table->foreign('task_file_id')->references('id')->on('task_files')
                ->onUpdate('cascade')->onDelete('cascade');

             $table->primary(['task_id', 'task_file_id']);
        });

        Schema::create('task_chat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->integer('user_id'); // user id
            $table->text('body');
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
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('task_files');
        Schema::dropIfExists('task_task_file');
        Schema::dropIfExists('task_chat');

    }
}
