<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // soporte
        Schema::create('provincias', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('name', 100)->unique(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('cantons', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->string('name', 100)->unique(); //varchar 255
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')
                ->references('id')
                ->on('provincias')
                ->onDelete('cascade');
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar


        });

        Schema::create('clientes', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 100); //varchar 255
            $table->string('apellido', 100); //varchar 255
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->unsignedInteger('users_id');
            $table->string('cedula', 13)->unique(); //varchar 255
            $table->date('fechanacimiento');
            $table->string('direccion', 100); //varchar 255
            $table->string('cdaorecinto', 150); //varchar 255
            $table->string('gps', 255); //varchar 255
            $table->string('contacto', 10); //varchar 255
            $table->string('contacto1', 10)->nullable(); //varchar 255
            $table->string('email', 60)->nullable(); //varchar 255
            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')
                ->references('id')
                ->on('cantons')
                ->onDelete('cascade');
            $table->boolean('estado')->default(1);
            $table->boolean('servicio')->default(1);
            $table->boolean('eliminar')->default(1);
            $table->string('ffoto')->nullable(); //varchar 255
            $table->string('fcedula1')->nullable();
            $table->string('fcedula2')->nullable();
            $table->string('latitud')->default('')->nullable();
            $table->string('longitud')->default('')->nullable();
            $table->string('distancia')->default('')->nullable();
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });


        Schema::create('novedads', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->dateTime('horainciar'); //varchar 255
            $table->boolean('novedadopercance');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
            $table->text('especificar')->nullable();

            $table->boolean('estado')->default(1);
            $table->boolean('eliminar')->default(1);
        });


        Schema::create('soporteradios', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->boolean('cantena')->nullable(); //varchar 255
            $table->boolean('crouter')->nullable(); //varchar 255
            $table->boolean('ccambiowiffi')->nullable(); //varchar 255
            $table->boolean('cfrecuencias')->nullable(); //varchar 255
            $table->string('cap', 100)->nullable(); //varchar 255
            $table->string('cip', 100)->nullable(); //varchar 255
            $table->string('cred', 100)->nullable(); //varchar 255
            $table->boolean('aanterior')->nullable(); //varchar 255
            $table->boolean('arouter')->nullable(); //varchar 255
            $table->string('accq')->nullable(); //varchar 255
            $table->string('aseñal')->nullable();
            $table->boolean('iconectores')->nullable();
            $table->boolean('irouter')->nullable();
            $table->boolean('ipoe')->nullable();
            $table->string('inconectores')->nullable();
            $table->string('imarcadelrouter')->nullable();
            $table->string('iantenaanterior')->nullable();
            $table->string('iantenanueva')->nullable();
            $table->string('imetroscable')->nullable();
            $table->boolean('itubogalvanizado')->nullable();
            $table->boolean('icable')->nullable();
            $table->boolean('iadicionocaña')->nullable();
            $table->boolean('ituboaluminio')->nullable();
            $table->unsignedBigInteger('novedad_id');
            $table->foreign('novedad_id')
                ->references('id')
                ->on('novedads')
                ->onDelete('cascade');
            $table->date('fecha')->nullable();
            $table->time('horallegada')->nullable();
            $table->time('horasalida')->nullable();
            $table->text('observaciones')->nullable();

            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar

        });


        Schema::create('soportefibras', function (Blueprint $table) {
            $table->id(); //interger  sin signo increment 
            $table->boolean('conu')->nullable(); //varchar 255
            $table->boolean('crouter')->nullable(); //varchar 255
            $table->boolean('ccambiowiffi')->nullable(); //varchar 255
            $table->boolean('arouter')->nullable(); //varchar 255
            $table->string('idbm')->nullable();
            $table->string('iupc')->nullable();
            $table->string('iapc')->nullable();
            $table->string('iodb')->nullable();
            $table->boolean('iconectores')->nullable();
            $table->boolean('irouter')->nullable();
            $table->boolean('icablered')->nullable();
            $table->string('inconectores')->nullable();
            $table->string('inmarcadelrouter')->nullable();
            $table->string('ionunueva')->nullable();
            $table->string('imetroscable')->nullable();
            $table->string('ionuanterior')->nullable();
            $table->boolean('icablefibra')->nullable();
            $table->unsignedBigInteger('novedad_id');
            $table->foreign('novedad_id')
                ->references('id')
                ->on('novedads')
                ->onDelete('cascade');

            $table->date('fecha')->nullable();
            $table->time('horallegada')->nullable();
            $table->time('horasalida')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar

        });
        // recursos humanos
        Schema::create('rrhareas', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 100); //varchar 255
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('rrhcargos', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 100); //varchar 255
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('rrhprofesions', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 150); //varchar 255
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });



        Schema::create('rrhempleados', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 100); //varchar 255
            $table->string('apellido', 100); //varchar 255
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->unsignedInteger('users_id');
            $table->string('cedula', 10)->unique(); //varchar 255
            $table->date('fechanacimiento');
            $table->string('direccion', 100); //varchar 255
            $table->string('cdaorecinto', 150); //varchar 255
            $table->string('contacto', 10); //varchar 255
            $table->string('contacto1', 10)->nullable(); //varchar 255
            $table->string('email', 60); //varchar 255
            $table->string('licencia', 60)->nullable(); //varchar 255
            $table->date('fechaingreso'); //varchar 255
            $table->double('sueldo', 8, 2); //varchar 255


            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')
                ->references('id')
                ->on('cantons')
                ->onDelete('cascade');
            $table->unsignedBigInteger('rrharea_id');
            $table->foreign('rrharea_id')
                ->references('id')
                ->on('rrhareas')
                ->onDelete('cascade');
            $table->unsignedBigInteger('rrhcargo_id');
            $table->foreign('rrhcargo_id')
                ->references('id')
                ->on('rrhcargos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('rrhprofesion_id');
            $table->foreign('rrhprofesion_id')
                ->references('id')
                ->on('rrhprofesions')
                ->onDelete('cascade');

            $table->boolean('sexo')->default(1);
            $table->boolean('estado')->default(1);
            $table->boolean('eliminar')->default(1);
            $table->string('ffoto')->nullable(); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });


        Schema::create('rrhtipocontratos', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 200); //varchar 255
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('rrhcontratos', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('descripcion', 200); //varchar 255
            $table->unsignedBigInteger('rrhempleado_id');
            $table->foreign('rrhempleado_id')
                ->references('id')
                ->on('rrhempleados')
                ->onDelete('cascade');

            $table->unsignedBigInteger('rrhtipocontrato_id');
            $table->foreign('rrhtipocontrato_id')
                ->references('id')
                ->on('rrhtipocontratos')
                ->onDelete('cascade');
            $table->string('archivo')->nullable(); //varchar 255
            $table->double('sueldo', 8, 2); //varchar 255
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });

        Schema::create('rrhcargafamiliars', function (Blueprint $table) {
            //$table->double('amount', 8, 2);
            $table->id(); //interger  sin signo increment 
            $table->string('nombre', 200); //varchar 255
            $table->string('parentezco', 200); //varchar 255
            $table->date('fechanacimiento'); //varchar 255
            $table->unsignedBigInteger('rrhempleado_id');
            $table->foreign('rrhempleado_id')
                ->references('id')
                ->on('rrhempleados')
                ->onDelete('cascade');
            $table->boolean('estado')->default(1);
            $table->timestamps(); // crea 2  columnas  created_at  y updated_at hora y fecha crear y actualizar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { // recursos
        Schema::dropIfExists('rrhcargafamiliars');
        Schema::dropIfExists('rrhcontratos');
        Schema::dropIfExists('rrhtipocontrato');

        Schema::dropIfExists('rrhempleado');
        Schema::dropIfExists('rrhprofesions');
        Schema::dropIfExists('rrhcargos');
        Schema::dropIfExists('rrhareas');
        // soporte
        Schema::dropIfExists('soportefibras');
        Schema::dropIfExists('soporteradios');
        Schema::dropIfExists('novedads');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('cantons');
        Schema::dropIfExists('provincias');
    }
}
