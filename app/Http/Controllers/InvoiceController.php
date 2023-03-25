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


    public function index($id){
        $pedido = Pedido::findOrFail($id);
        $cliente = $pedido->cliente;

        $customer = new Buyer([
            'name'          => $cliente->nome,
            'custom_fields' => [
                'email' => $cliente->email,
            ],
        ]);

        $item = (new InvoiceItem())->title('Serviço de Limpeza')->pricePerUnit($pedido->valor_total);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        // Crie uma nova instância do PDF e renderize a view de recibo
        $pdf = app(PDF::class);
        $pdf->loadView('pdf', compact('invoice', 'pedido', 'cliente'));

        // Retorne o PDF para o navegador
        return $pdf->stream();
    }
}
