<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;
    protected $fillable = [
        'entrega',
    ];
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
