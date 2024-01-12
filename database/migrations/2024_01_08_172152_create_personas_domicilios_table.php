<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('domicilio');
            $table->string('codigo_postal');
            $table->string('telefono');
            $table->string('email');
            $table->char('tipo', 1)->comment('P=personal / F=fiscal');
            $table->foreignId('persona_id')->constrained('personas');
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
        Schema::dropIfExists('personas_domicilios');
    }
}
