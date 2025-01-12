<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo',
        'estado_civil',
        'telefone',
        'email',
        'genero',
        'faixa_preco',
        'tipo_imovel_interesse',
    ];
}
