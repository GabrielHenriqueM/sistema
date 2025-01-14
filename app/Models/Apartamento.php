<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'bloco_predio',
        'numero_apartamento',
        'andar',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'quantidade_quartos',
        'quantidade_banheiros',
        'quantidade_vagas_garagem',
        'varanda_sacada',
        'area_lazer_condominio',
        'moveis_planejados',
        'area_total',
        'preco_imovel',
        'valor_condominio',
        'status',
    ];
}