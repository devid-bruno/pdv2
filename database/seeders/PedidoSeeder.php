<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pedido;
class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pedido::create([
        'cliente_id' => 4 ,
        'produto_id' => 21,
        'quantidade' => 1,
        'valor_unitario' => 38,99 ,
        'valor_total' => 38,99,
        'numero_pedido' => '389956',
        'status_id' => 1,
        'forma_pagamento' => 'pix',
        'entrega_id' => 1
        ]);
    }
}
