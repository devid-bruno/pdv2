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
        Schema::create('fornecedores_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fornecedores_id')->constrained();
            $table->unsignedBigInteger('categoria_id')->constrained();
            $table->timestamps();

            $table->foreign('fornecedores_id')->references('id')->on('fornecedores')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores_categorias');
    }
};
