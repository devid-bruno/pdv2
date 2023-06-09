<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Models\Produto;
use App\Models\Estoque;
use App\Models\Fornecedores;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::latest()->paginate(2);
        return view('dashboard.produto.listaproduto', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedores::all();
        return view('dashboard.produto.createproduto', compact('fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_produto' => 'required|string|max:255|unique:produtos,nome_produto,NULL,id',
            'descricao_produto' => 'required|string|max:255|unique:produtos,descricao_produto,NULL,id',
            'marca_produto' => 'required|string|max:255|unique:produtos,marca_produto,NULL,id',
            'fornecedor_id' => 'required|integer|exists:fornecedores,id',
        ]);

        $produto = new Produto([
            'nome_produto' => $request->input('nome_produto'),
            'descricao_produto' => $request->input('descricao_produto'),
            'marca_produto' => $request->input('marca_produto'),
            'fornecedor_id' => $request->input('fornecedor_id'),
        ]);

        $produto->save();

        return redirect()->route('estoque.add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $quantidade = $produto->estoque->quantidade;
        return view('dashboard.produto.editar', compact('produto', 'quantidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto, string $id)
    {
        $produto = Produto::findOrFail($id);

       $produto->delete();
       return redirect()->route('produto.lista');
    }
}
