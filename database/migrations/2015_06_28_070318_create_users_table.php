<?php

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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('email', 100);
                $table->string('password', 32);
                $table->rememberToken();
                $table->integer('plan_id')->unsigned();
                $table->string('firstname', 100)->nullable();
                $table->string('lastname', 100)->nullable();
                $table->boolean('admin')->default(0);

                $table->unique('email');
                $table->index(['firstname', 'lastname']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
