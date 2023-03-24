<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pedido.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();
        return view("dashboard.pedido.criar", compact('clientes', 'produtos'));
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
    ]);

    $cliente = Cliente::findOrFail($validatedData['cliente_id']);
    $produto = Produto::findOrFail($validatedData['produto_id']);
    $estoque = $produto->estoques()->firstOrFail();
    $quantidade = $validatedData['quantidade'];

    $valor_unitario = $estoque->valor_unitario;
    $valor_total = $valor_unitario * $quantidade;

    $pedido = Pedido::create([
        'cliente_id' => $cliente->id,
        'produto_id' => $produto->id,
        'quantidade' => $quantidade,
        'valor_unitario' => $valor_unitario,
        'valor_total' => $valor_total,
    ]);

    // atualizar a quantidade em estoque do produto
    $estoque->quantidade -= $quantidade;
    $estoque->save();

    return response()->json($pedido, 201);

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
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
