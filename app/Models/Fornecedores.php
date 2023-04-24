<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'cnpj', 'endereco', 'descricao', 'categoria_id'];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
    public function produtos()
{
    return $this->hasMany(Produto::class);
}
}
