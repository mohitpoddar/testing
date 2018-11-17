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
            $table->uuid('id')->primary();
            $table->uuid('project_id');
            $table->uuid('predecesor_t_id')->nullable();
            $table->uuid('owner_id');
            $table->uuid('responsible_id')->nullable();
            $table->uuid('delegated_id')->nullable();
            $table->tinyInteger('status')->default(-2);
            $table->tinyInteger('priority')->default(1);
            $table->text('title');
            $table->mediumtext('description');
            $table->string('classification');
            $table->date('assign_date');
            $table->date('due_date');
            $table->date('delegation_date')->nullable();
            $table->tinyInteger('delegation_status')->default(0);
            $table->date('closed_date')->nullable();
            $table->decimal('completion_pct', 8, 2)->nullable();
            $table->dateTime('comp_last_upd')->nullable();
            $table->uuid('comp_last_upd_userid')->nullable();
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
    }
}
