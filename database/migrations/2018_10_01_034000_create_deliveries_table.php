<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->uuid('associated_id')->nullable();
            $table->dateTime('dvy_time')->nullable();
            $table->uuid('dvy_userid');
            $table->mediumtext('dvy_comments');
            $table->dateTime('rcv_time')->nullable();
            $table->uuid('rcv_userid');
            $table->tinyInteger('rcv_result')->nullable();
            $table->mediumtext('rcv_comments');
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
        Schema::dropIfExists('deliveries');
    }
}
