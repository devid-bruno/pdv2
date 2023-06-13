<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funcionarios;
class FuncionarioController extends Controller
{
    public function index(){
        $funcionarios = funcionarios::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function cadastro(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_contratacao' => 'required|string|max:255',
            'salario_bruto' => 'required|max:255',
            'funcao' => 'required|string|max:255'
        ]);

        $funcionarios = new funcionarios([
            'nome' => $request->input('nome'),
            'data_contratacao' => $request->input('data_contratacao'),
            'salario_bruto' => $request->input('salario_bruto'),
            'funcao' => $request->input('funcao')
        ]);

        $funcionarios->save();

        return redirect()->route('funcionarios.index')->with('sucess', 'Funcionário cadastrado com sucesso!');
    }

    public function edicao($id){
        $funcionario = funcionarios::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, funcionarios $funcionarios, $id)
    {
    $funcionarios = funcionarios::find($id);

    $funcionarios->nome = $request->input('nome');
    $funcionarios->data_contratacao = $request->input('data_contratacao');
    $funcionarios->salario_bruto = $request->input('salario_bruto');
    $funcionarios->funcao = $request->input('funcao');

    $funcionarios->save();

    return redirect()->route('funcionarios.index');

    }

    public function destroy(funcionarios $funcionarios, string $id)
    {
        $funcionarios = funcionarios::findOrFail($id);

        $funcionarios->delete();
        return redirect()->route('funcionarios.index');
    }
}
