<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('organizacion');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('dni');
            $table->string('pasaporte');
            $table->string('otra_identificacion');
            $table->string('identidad');
            $table->string('otra_identidad');
            $table->string('fecha_nacimiento');
            $table->string('nivel_educativa');
            $table->string('completo_estudios');
            $table->string('calle');
            $table->string('numero');
            $table->string('torre');
            $table->string('piso');
            $table->string('departamento');
            $table->string('localidad');
            $table->string('partido');
            $table->string('provincia');
            $table->string('correo_electronico');
            $table->string('telefono');
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
