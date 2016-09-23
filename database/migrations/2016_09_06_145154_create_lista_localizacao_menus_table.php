<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaLocalizacaoMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('lista_localizacao_menus')) {
            Schema::create('lista_localizacao_menus', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('menu')->unsigned();
                $table->integer('localizacao')->unsigned();
                $table->foreign('menu')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('localizacao')->references('id')->on('localizacao_menus')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('lista_localizacao_menus');
    }
}
