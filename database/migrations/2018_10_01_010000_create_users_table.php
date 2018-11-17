<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Username and access information
            $table->uuid('id')->primary();
            $table->string('on_behalf_id')->nullable();
            $table->string('on_behalf_name')->nullable();
            $table->string('username');//->unique();
            $table->string('password');
            $table->tinyInteger('is_permission')->default(0); // 1 = Admin
            // Registration status
            $table->string('activation_code')->nullable();
            $table->boolean('status')->default(0);
            // Classification
            $table->string('group')->default('Development');
            $table->string('name');
            $table->string('email');//->unique();
            $table->string('img_src')->default('/assets/img/user.jpg');
            // Rights with projets
            $table->tinyInteger('assign_right')->default(0);
            $table->tinyInteger('delegate_right')->default(0);
            $table->tinyInteger('on_behalf_right')->default(0);            
            $table->string('lotus_solution')->default('Lotus');
            // Default Laravel connections
            $table->rememberToken();
            $table->timestamps();
            //$table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
