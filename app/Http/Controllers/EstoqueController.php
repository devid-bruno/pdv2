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
        $produtos = Produto::all();
        $estoques = Estoque::all();
        return view('dashboard.estoque.estoque', compact('produtos', 'estoques'));
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
            $estoque->estoques()->attach($produto);
        });

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
    public function update(UpdateEstoqueRequest $request, Estoque $estoque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estoque $estoque)
    {
        //
    }
}