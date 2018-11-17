<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('portfolio_id');
            $table->uuid('predecesor_p_id')->nullable();
            $table->uuid('owner_id');
            $table->uuid('responsible_id')->nullable();
            $table->tinyInteger('status')->default(-2);
            $table->tinyInteger('priority')->default(1);
            $table->text('title');
            $table->mediumtext('description');
            $table->text('source');
            $table->string('classification');
            $table->date('assign_date');
            $table->date('due_date');
            $table->date('closed_date')->nullable();
            $table->decimal('completion_pct', 8, 2)->nullable();
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
        Schema::dropIfExists('projects');
    }
}
