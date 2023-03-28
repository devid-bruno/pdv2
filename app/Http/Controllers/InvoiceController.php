<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Barryvdh\DomPDF\PDF;
use App\Models\Pedido;
class InvoiceController extends Controller
{
    public function index(){

        $data = Pedido::all();
        $valorTotal = $data->pluck('quantidade');
        $chartData = [
            'labels' => ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
            'datasets' => [
                ['label' => "Sales",
                'tension' => 0.4,
                'borderWidth' => 0,
                'borderSkipped' => false,
                'backgroundColor' => "#2ca8ff",
                'data' => [
                    $valorTotal,
                    200,
                    100,
                    220,
                    500,
                    100,
                    400,
                    230,
                    500,
                    200
                ],
                'maxBarThickness' => 6]
            ]

        ];

        return view('teste', ['chartData' => json_encode($chartData)]);
    }
}
