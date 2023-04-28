<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFornecedoresRequest;
use App\Http\Requests\UpdateFornecedoresRequest;
use App\Models\Fornecedores;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedores::first()->paginate(2);
        $categorias = Categoria::all();
        return view('dashboard.fornecedor.fornecedor', compact('fornecedores', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $fornecedores = Fornecedores::all();
        $categorias = Categoria::all();
        return view('dashboard.fornecedor.createFornecedor', compact('fornecedores', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|string',
            'telefone' => 'required|string',
            'cnpj' => 'required|string',
            'descricao' => 'required|string',
            'endereco' => 'required|string',
            'categoria_id' => 'required|integer'
        ]);


        $fornecedor = new Fornecedores([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'cnpj' => $request->input('cnpj'),
            'descricao' => $request->input('descricao'),
            'endereco' => $request->input('endereco'),
            'categoria_id' => $request->input('categoria_id'),
        ]);

        $categoria = Categoria::findOrFail($request->input('categoria_id'));

        $fornecedor -> save();


        DB::transaction(function () use ($fornecedor, $categoria) {
            $fornecedor->save();
            $fornecedor->categorias()->attach($categoria);
        });


        return redirect()->route('fornecedor.lista');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedores $fornecedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedores $fornecedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFornecedoresRequest $request, Fornecedores $fornecedores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedores $fornecedores, string $id)
    {
        $fornecedores = Fornecedores::find($id);
        // remover referências na tabela categoria_fornecedores
        DB::table('categoria_fornecedores')->where('fornecedores_id', $id)->delete();

        // excluir o fornecedor
        $fornecedores->delete();
        return redirect()->route('fornecedor.lista');
    }
}
