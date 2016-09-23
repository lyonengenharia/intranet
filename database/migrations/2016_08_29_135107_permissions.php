<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('permissions')) {
            Schema::create('permissions', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->boolean('read');
                $table->boolean('write');
                $table->integer('user')->unsigned();
                $table->integer('application')->unsigned();
                $table->foreign('user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('application')->references('id')->on('applications')->onDelete('cascade')->onUpdate('cascade');
                $table->timestamps();

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
        Schema::drop('permissions');
    }
}
