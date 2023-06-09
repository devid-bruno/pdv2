<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome_produto', 'descricao_produto', 'marca_produto', 'fornecedor_id'];

    public function estoque()
{
    return $this->hasOne(Estoque::class);
}
public function fornecedor()
{
    return $this->belongsTo(Fornecedores::class);
}
public function pedidos()
{
    return $this->hasMany(Pedido::class);
}
}
