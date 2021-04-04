<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chaves', function (Blueprint $table) {//cria a tabela chaves
            $table->unsignedBigInteger('id')->autoIncrement();//cria a linha de id com auto-incremento
            $table->string('codigo')->unique();//cria a linha codigo do tipo string
            $table->unsignedBigInteger('sala');//cria a linha sala que vai receber um inteiro para ser uma chave estrangeira
            $table->unsignedBigInteger('status');//cria a linha status que vai receber um inteiro para ser uma chave estrangeira
            $table->timestamps();


            //configura a chave estrangeira para a linha sala da tabela salas
            $table->foreign('sala')
                ->references('id')
                ->on('salas');

            //configura a chave estrangeira para a linha status da tabela status
            $table->foreign('status')
                ->references('id')
                ->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chave');
    }
}
