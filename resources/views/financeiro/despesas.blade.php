@extends('layoutsfinanceiro.header')
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
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            @if(session('alerta'))
                            <div class="alert alert-success">
                                {{ session('alerta') }}
                            </div>
                            @endif
                            <div class="d-sm-flex align-items-center mb-3">
                                <form action="" method="post">
                                    @csrf
                                    <div class="ms-auto d-flex">
                                        <div class="input-group input-group-sm ms-auto me-2">
                                            <span class="input-group-text text-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <input type="text" name="search" class="form-control form-control-sm"
                                                placeholder="Pesquisar">
                                        </div>
                                        <button type="submit" class="btn btn-info">Filtrar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Lista de Despesas</h6>
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
                                        <span class="btn-inner--text">Adicionar Despesas</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content">
                                            <div class="p-0 modal-body">
                                                <div class="card card-plain">
                                                    <div class="pb-0 text-left card-header">
                                                        <h3 class="font-weight-bolder text-dark">Cadastro</h3>
                                                        <p class="mb-0">Cadastro de despesa</p>
                                                    </div>
                                                    <div class="pb-3 card-body">
                                                        <form method="post" action="{{ route('despesas.cadastro') }}">
                                                            @csrf
                                                            <label>Categoria</label>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" name="categoria"
                                                                    placeholder="Digite a Categoria">
                                                            </div>
                                                            <label>Valor</label>
                                                            <div class="mb-3">
                                                                <input type="number" name="valor" class="form-control"
                                                                    placeholder="Entre com o Valor">
                                                            </div>
                                                            <label>Quem Pagou</label>
                                                            <div class="mb-3">
                                                                <input type="text" name="quem_pagou" class="form-control"
                                                                    placeholder="Quem Pagou">
                                                            </div>
                                                            <label>Forma Pagamento</label>
                                                            <div class="mb-3">
                                                                <input type="text" name="forma_pagamento" class="form-control"
                                                                    placeholder="Forma Pagamento">
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit"
                                                                    class="btn btn-dark w-100 mt-4 mb-3">Cadastro</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                                Categoria </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Valor</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Mais Informações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($despesas as $despesa)


                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $despesa->categoria }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $despesa->valor }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="">
                                                    <button type="button" class="btn btn-dark btn-icon px-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                                </button>
                                                <a href="">
                                                    <button class="btn btn-dark">
                                                        <i class="fas fa-print"></i>
                                                    </button>
                                                </a>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    todos
                                                                    detalhes</h5>
                                                                <button type="button" class="btn-close text-dark"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                Quem pagou: {{ $despesa->quem_pagou }}
                                                                <strong></strong>
                                                                <br>
                                                                Valor: {{ $despesa->valor }}
                                                                <strong></strong>
                                                                <br>
                                                                Forma pagamento: {{ $despesa->forma_pagamento }}
                                                                <strong></strong>
                                                                <br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-white"
                                                                    data-bs-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">

                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
