<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\ConnectionInterface;
use App\Models\Pedido;
use App\Models\Financeiro;
use Illuminate\Support\Facades\DB;


class FinanceiroJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $dados;

     public function __construct($dados)
     {
         $this->dados = $dados;
     }

    public function handle()
    {
        $diaria = rand(1, 100);
        $semanal = rand(1, 100);
        $mensal = rand(1, 100);
        $anual = rand(1, 100);
        $data = now();

        DB::table('financeiros')->insert([
            'diaria' => $diaria,
            'semanal' => $semanal,
            'mensal' => $mensal,
            'anual' => $anual,
            'data' => $data,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}
