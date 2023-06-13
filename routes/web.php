<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\NotaFiscalController;
use App\Http\Controllers\FuncionarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [UsersController::class, 'index'])->name('login');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::get("/dashboard", [UsersController::class, 'show'])->name('users');


Route::get('/register', [UsersController::class, 'create'])->name('adicionar');
Route::post('/registro', [UsersController::class, 'store'])->name('users.register');
Route::post('/login', [UsersController::class, 'login'])->name('login.submit');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('fornecedor.lista')->middleware('auth');
Route::get('/fornecedoresadd', [FornecedoresController::class, 'create'])->name('fornecedor.add')->middleware('auth');
Route::post('/criarfornecedores', [FornecedoresController::class, 'store'])->name('fornecedor.criar')->middleware('auth');
Route::delete('/fornecedor/{id}/delete', [FornecedoresController::class, 'destroy'])->name('fornecedor.exclui')->middleware('auth');

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/lista', [ClienteController::class, 'create'])->name('clientes.lista');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.criar');

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produto.lista');
Route::get('/produto', [ProdutoController::class, 'create'])->name('produto.add');
Route::post('/addproduto', [ProdutoController::class, 'store'])->name('produto.criar');
Route::get('/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::delete('/produtos/{id}/delete', [ProdutoController::class, 'destroy'])->name('produto.excluir');


Route::get('/estoque', [EstoqueController::class, 'create'])->name('estoque.add');
Route::get('/quantidade', [EstoqueController::class, 'quantidade'])->name('quantidade.add');
Route::post('/add', [EstoqueController::class, 'store'])->name('estoque.adds');
Route::post('/addquantidade', [EstoqueController::class, 'adicionarQuantidade'])->name('add.quantidade');


Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedido.lista');
Route::get('/pedido', [PedidoController::class, 'create'])->name('pedido.add');
Route::post('/addpedido', [PedidoController::class, 'store'])->name('pedido.adds');
Route::get('/pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('pedido.edit')->middleware('auth');
Route::put('/pedidos/{id}', [PedidoController::class, 'update'])->name('pedido.update');
Route::post('/pedido/search', [PedidoController::class, 'search'])->name('pedido.filtro');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.lista')->middleware('auth');
Route::get('/categorias', [CategoriaController::class, 'create'])->name('categoria.adicionar')->middleware('auth');
Route::post('/criar', [CategoriaController::class, 'store'])->name('criar.categoria')->middleware('auth');
Route::delete('/categoria/{id}/delete', [CategoriaController::class, 'destroy'])->name('categoria.destroy')->middleware('auth');


Route::prefix('financeiro')->group(function () {
    Route::get('/home', [FinanceiroController::class, 'index'])->name('financeiro.home');
    Route::get('/despesas', [FinanceiroController::class, 'despesas'])->name('financeiro.despesas');
    Route::post('/cadastrodespesa', [FinanceiroController::class, 'cadastrodespesa'])->name('despesas.cadastro');
    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::post('/cadastrofuncionario', [FuncionarioController::class, 'cadastro'])->name('funcionarios.cadastro');
    Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edicao'])->name('funcionarios.edit');
    Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
    Route::delete('/funcionarios/{id}/delete', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');

});
// Route::get('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro')->middleware('checkRole:2');
Route::get('/imprimir-nota/{id}', [FinanceiroController::class, 'imprimirNota'])->name('nota');
Route::get('/relatorio', [FinanceiroController::class, 'gerarRelatório'])->name('gera.relatorio');
Route::get('/relatorioremessa', [FinanceiroController::class, 'RelatórioRemessas'])->name('gera.relatorioremessa');
