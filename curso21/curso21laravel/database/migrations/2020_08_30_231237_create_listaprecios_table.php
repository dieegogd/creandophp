<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListapreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listaprecios', function (Blueprint $table) {
            $table->id();
            $table->double('precio', 8, 2);
            $table->bigInteger('articulo_id')->unsigned();
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('no action')->onUpdate('no action');
            $table->bigInteger('localidad_id')->unsigned();
            $table->foreign('localidad_id')->references('id')->on('localidads')->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listaprecios');
    }
}
