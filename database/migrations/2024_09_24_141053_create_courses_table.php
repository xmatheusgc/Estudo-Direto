<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('title'); // Título do curso
            $table->text('description'); // Descrição do curso
            $table->decimal('price', 8, 2); // Preço do curso (8 dígitos no total, 2 após a vírgula)
            $table->string('course_image')->nullable(); // Imagem do curso (opcional)
            $table->string('video')->nullable(); // Link do vídeo (opcional)
            $table->integer('duration'); // Duração do curso em horas
            $table->string('level')->nullable(); // Nível do curso (Básico, Intermediário, Avançado)
            $table->string('resources')->nullable(); // Recursos adicionais do curso (opcional)
            $table->string('category'); // Categoria do curso
            $table->string('type')->nullable(); // Tipo de curso (Programação, FGB, Outro, etc)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionamento com o usuário
            $table->timestamps(); // Data de criação e atualização
        });
    }    

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
