<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Livro', function (Blueprint $table) {
            $table->id('Codl');
            $table->string('Titulo', 40);
            $table->string('Editora', 40)->nullable(false);
            $table->integer('Edicao')->nullable(false);
            $table->string('AnoPublicacao', 4)->nullable(false);
            $table->decimal('Valor', 10, 2)->nullable(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
