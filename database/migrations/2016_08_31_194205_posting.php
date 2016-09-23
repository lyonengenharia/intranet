<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posting')) {
            Schema::create('posting', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('title');
                $table->longText('body');
                $table->boolean('published');
                $table->dateTime('data_published');
                $table->integer('user_published')->unsigned();
                $table->foreign('user_published')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('posting');
    }
}
