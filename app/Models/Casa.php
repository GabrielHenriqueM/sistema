<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    use HasFactory;

    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'quantidade_quartos',
        'area_de_lazer',
        'quantidade_banheiros',
        'garagem',
        'area_total',
        'preco_imovel',
        'status', 
    ];

}
