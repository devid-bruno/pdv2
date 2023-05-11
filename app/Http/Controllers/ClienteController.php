<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Charts\SampleChart;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $clientes = Cliente::select('id', 'nome')->withCount('pedidos')->orderBy('nome')->paginate(4);

        return view('dashboard.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:clientes,nome,NULL,id',
            'cpf' => 'required|string',
            'endereco' => 'required|string|max:255|unique:clientes,endereco,NULL,id',
            'telefone' => 'required|string'
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('dashboard.cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'cpf' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
        ]);

        $cliente->nome = $validatedData['nome'];
        $cliente->cpf = $validatedData['cpf'];
        $cliente->endereco = $validatedData['endereco'];
        $cliente->telefone = $validatedData['telefone'];

        $cliente->save();
        $mensagem = 'Cliente atualizado com sucesso!';
        session()->flash('atualiza', $mensagem);
         return redirect()->route('clientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
