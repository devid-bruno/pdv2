@extends('layouts.header')
@section('content')

    <body class="g-sidenav-show  bg-gray-100">

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur"
                navbar-scroll="true">
                <div class="container-fluid py-1 px-2">
                    <nav aria-label="breadcrumb">
                        <h6 class="font-weight-bold mb-0">Dashboard</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        </div>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item ps-2 d-flex align-items-center">
                                <div class="dropdown text-end">
                                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('img/team-2.jpg') }}" class="avatar avatar-sm" alt="avatar" />
                                    </a>
                                    <ul class="dropdown-menu text-small">
                                        <li><a class="dropdown-item" href="#">New project...</a></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid py-4 px-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-md-flex align-items-center mb-3 mx-2">
                            <div class="mb-md-0 mb-3">
                                <h3 class="font-weight-bold mb-0">
                                    @if (auth()->check())
                                        Olá, {{ auth()->user()->name }}!
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid py-4 px-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border shadow-xs mb-4">
                                <div class="card-header border-bottom pb-0">
                                    <div class="d-sm-flex align-items-center">
                                        <div>
                                            <h6 class="font-weight-semibold text-lg mb-0">Lista de usuários</h6>
                                        </div>
                                        <div class="ms-auto d-flex">
                                            <button type="button"
                                                class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">
                                                <span class="btn-inner--icon">
                                                    <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                                        <path
                                                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                                    </svg>
                                                </span>
                                                <span class="btn-inner--text">Adicionar Usuário</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content">
                                            <div class="p-0 modal-body">
                                                <div class="card card-plain">
                                                    <div class="pb-0 text-left card-header">
                                                        <h3 class="font-weight-bolder text-dark">Sign up</h3>
                                                        <p class="mb-0">Enter your email and password to register</p>
                                                    </div>
                                                    <div class="pb-3 card-body">
                                                        <form method="post" action="{{route('users.register')}}">
                                                            @csrf
                                                            <label>Nome</label>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Digite o nome Completo">
                                                            </div>
                                                            <label>Email</label>
                                                            <div class="mb-3">
                                                                <input type="email" name="email" class="form-control"
                                                                    placeholder="Entre com o email">
                                                            </div>
                                                            <label>Senha</label>
                                                            <div class="mb-3">
                                                                <input type="password" name="password" class="form-control"
                                                                    placeholder="Senha">
                                                            </div>
                                                            <label>Nível de acesso:</label>
                                                            <div class="d-flex align-items-center">
                                                                <select class="form-select" name="role_id" id="role_id">
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->id }}">
                                                                            {{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit"
                                                                    class="btn btn-dark w-100 mt-4 mb-3">Cadastro</button>
                                                            </div>
                                                            @if ($errors->has('login'))
                                                                <br>
                                                                <div class="alert alert-success" role="alert">
                                                                    {{ $errors->first('login') }}
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body px-0 py-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Função
                                    </th>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                        Email</th>

                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <h6 class="mb-0 text-sm font-weight-semibold">{{ $user->name }}</h6>
                                                    <p class="text-sm text-secondary mb-0"></p>
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0"></p>
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $user->roles->first()->name ?? 'Sem papel definido' }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0"></p>
                                            <p class="text-sm text-secondary mb-0">{{ $user->email }}</p>
                                        </td>
                                        <td class="align-middle">


                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('users.edit', $user->id) }}">
                                                    <button type="button" class="btn btn-dark btn-icon px-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                            </path>
                                                        </svg>
                                                    </button></a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-dark btn-icon px-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="border-top py-3 px-3 d-flex align-items-center">
                        <p class="font-weight-semibold mb-0 text-dark text-sm">Page 1 of 10</p>
                        <div class="ms-auto">
                            <button class="btn btn-sm btn-white mb-0">Previous</button>
                            <button class="btn btn-sm btn-white mb-0">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        @endsection
