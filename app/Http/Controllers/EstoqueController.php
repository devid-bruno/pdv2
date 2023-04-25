<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstoqueRequest;
use App\Http\Requests\UpdateEstoqueRequest;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        return view('dashboard.estoque.estoque', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'valor_unitario' => 'required',
            'valor_total' => 'required',
            'quantidade' => 'required',
            'produto_id' => 'required|integer',
        ]);


        $estoque = new Estoque([
            'valor_unitario' => $request->input('valor_unitario'),
            'valor_total' => $request->input('valor_total'),
            'quantidade' => $request->input('quantidade'),
            'produto_id' => $request->input('produto_id'),
        ]);

        $produto = Produto::findOrFail($request->input('produto_id'));

        DB::transaction(function () use ($estoque, $produto) {
            $estoque->save();
            $estoque->produto()->associate($produto);
        });

        return redirect()->route('produto.lista');
    }

    public function quantidade()
    {
        $produtos = Produto::all();
        return view('dashboard.estoque.quantidade', compact('produtos'));
    }

    public function adicionarQuantidade(Request $request)
    {
        // Busca o estoque correspondente ao produto selecionado na view
        $estoque = Estoque::where('produto_id', $request->produto_id)->first();

        // Soma a quantidade atual com a quantidade informada no formulário
        $novaQuantidade = $estoque->quantidade + $request->quantidade;

        // Calcula os novos valores de unitário e total
        $novoValorUnitario = $estoque->valor_unitario;
        $novoValorTotal = $estoque->valor_total + ($request->quantidade * $novoValorUnitario);

         // Incrementa a quantidade de remessas
        $novaRemessa = $estoque->remessas + 1;

        // Atualiza o estoque no banco de dados com a nova quantidade, valor unitário e valor total
        $estoque->quantidade = $novaQuantidade;
        $estoque->valor_unitario = $novoValorUnitario;
        $estoque->valor_total = $novoValorTotal;
        $estoque->remessas = $novaRemessa;
        $estoque->save();

        // Retorna a mensagem de sucesso para a view
        $mensagem = 'Estoque adicionada com sucesso!';
        session()->flash('atualiza', $mensagem);
        return redirect()->route('produto.lista');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estoque $estoque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estoque $estoque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $estoque = Estoque::findOrFail($id);
        $estoque->quantidade = $request->quantidade;
        $estoque->save();

        return redirect()->back()->with('success', 'Quantidade de estoque atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estoque $estoque)
    {
        //
    }
}
