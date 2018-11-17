<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('extension');
            $table->string('owner_type');
            $table->uuid('owner_id');
            $table->uuid('user_id');
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); TODO define cascade actions when deleting a user, a portfolio, a project, a task or a delivery
            //Path for files: storage/public/{owner_type}/{owner_id}/{file_type}/{file_name}
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
