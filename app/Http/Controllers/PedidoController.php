<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Entrega;



class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::latest()->paginate(2);
        $entregas = Entrega::all();
        return view('dashboard.pedido.index', compact("pedidos", 'entregas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();
        $status = Status::all();
        $entregas = Entrega::all();
        return view("dashboard.pedido.criar", compact('clientes', 'produtos', 'status', 'entregas'));
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
        'forma_pagamento' => 'required|string',
        'entrega_id' => 'required|string',
        'valor_unitario' => 'required'
    ]);

    $numero_pedido = rand(10000, 99999);

    $cliente = Cliente::findOrFail($validatedData['cliente_id']);
    $produto = Produto::findOrFail($validatedData['produto_id']);
    $status = Status::findOrFail($validatedData['status_id']);
    $entrega = Entrega::findOrFail($validatedData['entrega_id']);

    $estoque = $produto->estoque()->firstOrFail();
    $quantidade = $validatedData['quantidade'];
    $forma_pagamento = $validatedData['forma_pagamento'];

    $valor_unitario = $validatedData['valor_unitario'];
    $valor_total = $valor_unitario * $quantidade;

    $pedido = Pedido::create([
        'numero_pedido' => $numero_pedido,
        'cliente_id' => $cliente->id,
        'produto_id' => $produto->id,
        'quantidade' => $quantidade,
        'valor_unitario' => $valor_unitario,
        'valor_total' => $valor_total,
        'status_id' => $status->id,
        'forma_pagamento' => $forma_pagamento,
        'entrega_id' => $entrega->id
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
        $entregas = Entrega::all();
        return view('dashboard.pedido.edit', compact('pedidos', 'status', 'entregas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido, $id)
    {
    $pedido = Pedido::find($id);

    $pedido->quantidade = $request->input('quantidade');
    $pedido->status_id = $request->input('status_id');
    $pedido->entrega_id = $request->input('entrega_id');
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

    public function search(Request $request)
    {
            $pedidos = Pedido::query();
            if ($request->has('search')) {
                $search = $request->search;
                $pedidos->where('numero_pedido', '=', $search)
                    ->orWhere('forma_pagamento', 'LIKE', "%{$search}%")
                    ->orWhereHas('cliente', function ($query) use ($search) {
                        $query->where('nome', 'LIKE', "%{$search}%");
                    });
            }
            $pedidos = $pedidos->paginate(2);
            return view('dashboard.pedido.index', compact('pedidos'));
    }
}
