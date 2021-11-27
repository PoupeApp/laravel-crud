<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GeneroLivroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_livro', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('genero_id');
            $table->unsignedBigInteger('livro_id');
            $table->foreign('genero_id')->references('id')->on('generos')->cascadeOnDelete();
            $table->foreign('livro_id')->references('id')->on('livros')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genero_livro');
    }
}
