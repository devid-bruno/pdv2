<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $users = User::first()->paginate(2);
        return view('dashboard.users', compact('roles', 'users'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role_id === 2) {
                return redirect()->route('financeiro');
            } else {
                return redirect()->route('users');
            }
        }
        return redirect()->route('login')->withErrors(['login' => 'Credenciais inválidas.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required|integer',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
        ]);

        $role = Role::findOrFail($request->input('role_id'));

        DB::transaction(function () use ($user, $role) {
            $user->save();
            $user->roles()->attach($role);
        });

        return redirect()->route('users')->with('success', 'Cadastro realizado com sucesso. Faça login para acessar sua conta.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $pedidos = Pedido::latest()->paginate(2);
        $hoje = Carbon::today();
        $valor_diaria = Pedido::where('created_at', '>=', $hoje)->where('status_id', 1)->sum('valor_total');

        $dataInicioSemana = $hoje->startOfWeek();
        $valorTotal = Pedido::where('created_at', '>=', $dataInicioSemana)->where('status_id', 1)->sum('valor_total');

        $dataAno = $hoje->startOfYear();
        $valorTotalanual = Pedido::where('created_at', '>=', $dataAno)->where('status_id', 1)->sum('valor_total');

        $datames = $hoje->startOfMonth();
        $valorTotalmes = Pedido::where('created_at', '>=', $datames)->where('status_id', 1)->sum('valor_total');

        if(Auth::check()){
            return view('dashboard.home', compact('valor_diaria', 'valorTotal', 'valorTotalanual', 'valorTotalmes', 'pedidos'));
        }
        return redirect()->route('login')->withErrors(['login' => 'Favor, fazer login.']);
    }

    public function vendasSemanais()
{
        if (Auth::check()) {
            return view('dashboard.home', compact('valorTotal'));
        }
        return redirect()->route('login')->withErrors(['login' => 'Favor, fazer login.']);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all();

        return view('dashboard.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role_id' => 'required|integer',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->roles()->detach();

        $role = Role::findOrFail($validatedData['role_id']);
        $user->roles()->attach($role);

        $user->save();

        return redirect()->route('adicionar')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users')->with('success', 'Usuário excluído com sucesso!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
