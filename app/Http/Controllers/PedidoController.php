<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Status;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;



class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('dashboard.pedido.index', compact("pedidos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();
        $status = Status::all();
        return view("dashboard.pedido.criar", compact('clientes', 'produtos', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    $validatedData = $request->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'produto_id' => 'required|exists:produtos,id',
        'quantidade' => 'required|integer|min:1',
        'status_id' => 'required|exists:statuses,id',
    ]);

    $numero_pedido = rand(10000, 99999);

    $cliente = Cliente::findOrFail($validatedData['cliente_id']);
    $produto = Produto::findOrFail($validatedData['produto_id']);
    $status = Status::findOrFail($validatedData['status_id']);

    $estoque = $produto->estoques()->firstOrFail();
    $quantidade = $validatedData['quantidade'];

    $valor_unitario = $estoque->valor_unitario;
    $valor_total = $valor_unitario * $quantidade;

    $pedido = Pedido::create([
        'numero_pedido' => $numero_pedido,
        'cliente_id' => $cliente->id,
        'produto_id' => $produto->id,
        'quantidade' => $quantidade,
        'valor_unitario' => $valor_unitario,
        'valor_total' => $valor_total,
        'status_id' => $status->id
    ]);

    // atualizar a quantidade em estoque do produto
    $estoque->quantidade -= $quantidade;
    $estoque->save();

    return redirect()->route('pedido.lista');

}


    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pedidos = Pedido::findOrFail($id);
        $status = Status::all();
        return view('dashboard.pedido.edit', compact('pedidos', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido, $id)
    {
    $pedido = Pedido::find($id);

    $pedido->quantidade = $request->input('quantidade');
    $pedido->status_id = $request->input('status_id');
    $pedido->valor_total = $request->input('valor_total');

    $pedido->save();

    return redirect()->route('pedido.lista');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function gerarRecibo($id)
{
    $customer = new Buyer([
        'name'          => 'John Doe',
        'custom_fields' => [
            'email' => 'test@example.com',
        ],
    ]);

    $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

    $invoice = Invoice::make()
        ->buyer($customer)
        ->discountByPercent(10)
        ->taxRate(15)
        ->shipping(1.99)
        ->addItem($item);

    return $invoice->stream();
}
}