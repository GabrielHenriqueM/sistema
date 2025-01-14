<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'imovel_id',
        'tipo_imovel',
        'valor_venda',
        'data_venda',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
