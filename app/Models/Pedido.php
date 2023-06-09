<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'produto_id',
        'quantidade',
        'valor_unitario',
        'valor_total',
        'numero_pedido',
        'status_id',
        'forma_pagamento',
        'entrega_id',
        'data_venda'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function status()
     {
         return $this->belongsTo(Status::class);
     }
     public function entrega()
     {
         return $this->belongsTo(Entrega::class);
     }
}
