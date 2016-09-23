<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('menus_itens')) {
            Schema::create('menus_itens', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('item_id')->unsigned();
                $table->integer('menus_id')->unsigned();
                $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('menus_id')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('menus_itens');
    }
}
