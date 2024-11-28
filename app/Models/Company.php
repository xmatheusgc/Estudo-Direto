<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'company_cnpj', 'company_phone', 'company_address', 'user_id',
    ];

    // Define a tabela se o nome não for o padrão plural do modelo
    protected $table = 'companies';

    // Relacionamento com o User (assumindo que uma empresa tem um único usuário)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
