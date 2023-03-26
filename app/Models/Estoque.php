<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $fillable = ['valor_unitario', 'valor_total', 'quantidade', 'produto_id'];

    public function estoques()
     {
         return $this->belongsToMany(Produto::class);
     }
}