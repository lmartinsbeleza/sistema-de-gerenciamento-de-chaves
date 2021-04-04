<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();//cria a linha de id com auto-incremento
            $table->unsignedBigInteger('retirou');//cria a linha retirou que vai receber um inteiro para ser uma chave estrangeira
            $table->unsignedBigInteger('devolveu')->nullable();//cria a linha devolveu que vai receber um inteiro para ser uma chave estrangeira
            $table->unsignedBigInteger('chave');//cria a linha chave que vai receber um inteiro para ser uma chave estrangeira
            $table->dateTimeTz('dataAgendou');//cria a linha dataAgendou do tipo timezone
            $table->dateTimeTz('dataRetirar')->nullable();//cria a linha dataRetirar do tipo timezone
            $table->dateTimeTz('dataDevolver')->nullable();//cria a linha dataDevolver do tipo timezone
            $table->timestamps();

            //configura a chave estrangeira para a linha retirou da tabela users
            $table->foreign('retirou')
                ->references('id')
                ->on('users');

            //configura a chave estrangeira para a linha devolveu da tabela users
            $table->foreign('devolveu')
                ->references('id')
                ->on('users');

            //configura a chave estrangeira para a linha chave da tabela chaves
            $table->foreign('chave')
                ->references('id')
                ->on('chaves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controle');
    }
}
