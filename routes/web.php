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

Route::middleware(['auth', 'checkrole:T.I.'])->group(function () {
    Route::get('/register', [UsersController::class, 'create'])->name('adicionar');
    Route::post('/registro', [UsersController::class, 'store'])->name('users.register');
    Route::post('/login', [UsersController::class, 'login'])->name('login.submit');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});


Route::middleware(['auth', 'checkrole:Administrador'])->group(function () {

    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('fornecedor.lista')->middleware('auth');
    Route::get('/fornecedoresadd', [FornecedoresController::class, 'create'])->name('fornecedor.add')->middleware('auth');
    Route::post('/criarfornecedores', [FornecedoresController::class, 'store'])->name('fornecedor.criar')->middleware('auth');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
    Route::get('/lista', [ClienteController::class, 'create'])->name('clientes.lista');
    Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.criar');

    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produto.lista');
    Route::get('/produto', [ProdutoController::class, 'create'])->name('produto.add');
    Route::post('/addproduto', [ProdutoController::class, 'store'])->name('produto.criar');


    Route::get('/estoque', [EstoqueController::class, 'create'])->name('estoque.add');
    Route::post('/add', [EstoqueController::class, 'store'])->name('estoque.adds');


    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedido.lista');
    Route::get('/pedido', [PedidoController::class, 'create'])->name('pedido.add');
    Route::post('/addpedido', [PedidoController::class, 'store'])->name('pedido.adds');
    Route::get('/pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('pedido.edit')->middleware('auth');
    Route::put('/pedidos/{id}', [PedidoController::class, 'update'])->name('pedido.update');
    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.lista')->middleware('auth');
    Route::get('/categorias', [CategoriaController::class, 'create'])->name('categoria.adicionar')->middleware('auth');
    Route::post('/criar', [CategoriaController::class, 'store'])->name('criar.categoria')->middleware('auth');
    Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy')->middleware('auth');
});


Route::middleware(['auth', 'checkrole:Financeiro'])->group(function () {
    Route::get('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro.funcionarios');
});




