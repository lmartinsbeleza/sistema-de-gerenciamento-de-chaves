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
        Schema::create('users', function (Blueprint $table) {//cria a tabela users no banco de dados
            $table->unsignedBigInteger('id')->autoIncrement();//cria a linha de id com auto-incremento
            $table->string('name');//cria a linha name do tipo string
            $table->string('email')->unique();//cria a linha email do tipo string
            $table->string('password');//cria a linha password do tipo string
            $table->unsignedBigInteger('cargo');//cria a linha cargo que vai receber um inteiro para ser uma chave estrangeira
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            //configura a chave estrangeira para a linha cargo da tabela cargos
            $table->foreign('cargo')
                ->references('id')
                ->on('cargos');
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
