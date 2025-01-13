<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_lote',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'area_total',
        'valor_loteamento',
        'observacoes',
        'status',
    ];
}
