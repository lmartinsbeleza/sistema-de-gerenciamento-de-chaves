<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {//cria a tabela cargos no banco de dados
            $table->unsignedBigInteger('id')->autoIncrement();//cria a linha de id com auto-incremento
            $table->string('cargo');//cria a linha de cargo, que vai guarda o nome de cada cargo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargo');
    }
}
