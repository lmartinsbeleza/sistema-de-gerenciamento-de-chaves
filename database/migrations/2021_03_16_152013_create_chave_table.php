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
        Schema::create('chaves', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('codigo')->unique();
            $table->unsignedBigInteger('sala');
            $table->unsignedBigInteger('status');
            $table->timestamps();

            $table->foreign('sala')
                ->references('id')
                ->on('salas');

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
