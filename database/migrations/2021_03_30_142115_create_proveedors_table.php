<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();//interger  sin signo increment 
            $table->string('name',100);//varchar 255
            $table->string('apellido',100);//varchar 255
            $table->integer('user_id')->unsigned();
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->unsignedInteger('users_id');
            $table->string('cedula',100)->nullable();//varchar 255
            $table->string('direccion',50)->nullable();//varchar 255
            $table->timestamps();// crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
         
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
