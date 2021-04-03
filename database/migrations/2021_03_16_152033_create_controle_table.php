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
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('retirou');
            $table->unsignedBigInteger('devolveu')->nullable();
            $table->unsignedBigInteger('chave');
            $table->dateTimeTz('dataAgendou');
            $table->dateTimeTz('dataRetirar')->nullable();
            $table->dateTimeTz('dataDevolver')->nullable();
            $table->timestamps();

            $table->foreign('retirou')
                ->references('id')
                ->on('users');

            $table->foreign('devolveu')
                ->references('id')
                ->on('users');

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
