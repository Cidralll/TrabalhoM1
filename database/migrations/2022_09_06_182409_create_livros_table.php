<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('nome_livro', 45);
            $table->string('nome_original', 45);
            $table->string('genero_livro', 45);
            $table->string('sinopse_livro', 45);
            $table->string('paginas_livro', 45);
            $table->string('anopub_livro', 45);
            $table->string('editora_livro', 45);
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
        Schema::dropIfExists('livros');
    }
};
