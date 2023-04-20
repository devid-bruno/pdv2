<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entrega;

class EntregasSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entrega::create(['Entrega' => 'Entregue']);
        Entrega::create(['Entrega' => 'Pendente']);
    }
}
