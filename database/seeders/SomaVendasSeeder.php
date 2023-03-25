<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Pedido;

class SomaVendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $numero_pedido = rand(10000, 99999);

        $hoje = Carbon::today();

        // Insere 365 registros aleatórios para testar a soma anual
        for ($i = 1; $i <= 365; $i++) {
            $data = $hoje->copy()->subDays($i);
            Pedido::create([
                'produto_id' => 1,
                'cliente_id' => 1,
                'quantidade' => 1,
                'valor_unitario' => rand(10, 100),
                'valor_total' => rand(10, 100),
                'status_id' => 1,
                'created_at' => $data,
                'updated_at' => $data,
                'numero_pedido' => $numero_pedido
            ]);
        }

        // Insere 52 registros aleatórios para testar a soma semanal
        for ($i = 1; $i <= 52; $i++) {
            $data = $hoje->copy()->subWeeks($i);
            Pedido::create([
                'produto_id' => 1,
                'cliente_id' => 1,
                'quantidade' => 1,
                'valor_unitario' => rand(10, 100),
                'valor_total' => rand(10, 100),
                'status_id' => 1,
                'created_at' => $data,
                'updated_at' => $data,
                'numero_pedido' => $numero_pedido
            ]);
        }

        // Insere 30 registros aleatórios para testar a soma mensal
        for ($i = 1; $i <= 30; $i++) {
            $data = $hoje->copy()->subMonths($i);
            Pedido::create([
                'produto_id' => 1,
                'cliente_id' => 1,
                'quantidade' => 1,
                'valor_unitario' => rand(10, 100),
                'valor_total' => rand(10, 100),
                'status_id' => 1,
                'created_at' => $data,
                'updated_at' => $data,
                'numero_pedido' => $numero_pedido
            ]);
        }

        // Insere 7 registros aleatórios para testar a soma diária
        for ($i = 1; $i <= 7; $i++) {
            $data = $hoje->copy()->subDays($i);
            Pedido::create([
                'produto_id' => 1,
                'cliente_id' => 1,
                'quantidade' => 1,
                'valor_unitario' => rand(10, 100),
                'valor_total' => rand(10, 100),
                'status_id' => 1,
                'created_at' => $data,
                'updated_at' => $data,
                'numero_pedido' => $numero_pedido
            ]);
        }
    }
}
