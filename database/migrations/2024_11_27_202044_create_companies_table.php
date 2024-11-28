<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_cnpj')->unique();
            $table->string('company_phone')->nullable();
            $table->string('company_address')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relacionamento com a tabela 'users'
            $table->timestamps();
        });
    }    
    
    public function down()
    {
        Schema::dropIfExists('companies');
    }    
};
