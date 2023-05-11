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
        <form action="{{route('pedido.filtro')}}" method="post">
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
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Pesquisar">
            </div>
            <button type="submit" class="btn btn-info">Filtrar</button>
        </div>
    </form>
    </div>
</div>
<div class="card-body px-0 py-0">
    <div class="table-responsive p-0">
        <table class="table align-items-center justify-content-center mb-0">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7">
                        Nº Pedido </th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7">
                        Cliente </th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                        Mais Informações</th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                        Status de Pagamento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($pedidos as $pedido)
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">
                                        {{ $pedido->numero_pedido }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">
                                        {{ $pedido->cliente->nome }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('pedido.edit', $pedido->id) }}">
                                <button type="button" class="btn btn-dark btn-icon px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                </button>
                            </a>
                            <button type="button" class="btn btn-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $pedido->id }}">
                                <i class="fa-sharp fa-solid fa-eye"></i>
                            </button>
                            <a href="{{ route('nota', $pedido->id) }}">
                                <button class="btn btn-dark">
                                  <i class="fas fa-print"></i>
                                </button>
                              </a>
                            <div class="modal fade" id="exampleModal{{ $pedido->id }}"
                                tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered"
                                    role="document">
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
                                            Quantidade:
                                            <strong>{{ $pedido->quantidade }}</strong>
                                            <br>
                                            Data venda:
                                            <strong>{{ \DateTime::createFromFormat('Y-m-d', $pedido->data_venda)->format('d/m/Y')}}</strong>
                                            <br>
                                            Endereço
                                            <strong>{{ $pedido->cliente->endereco }}</strong>
                                            <br>
                                            CPF
                                            <strong>{{ $pedido->cliente->cpf }}</strong>
                                            <br>
                                            Contato
                                            <strong>{{ $pedido->cliente->telefone }}</strong>
                                            <br>
                                            Comprou:
                                            <strong>{{ $pedido->produto->nome_produto }} - {{ $pedido->produto->marca_produto }} </strong>
                                            <br>
                                            Gastou:
                                            <strong>{{ $pedido->valor_total }}</strong>
                                            <br>
                                            Forma de Pagamento:
                                            <strong>{{ $pedido->forma_pagamento}}</strong>
                                            <br>
                                            Entrega:
                                            <strong>{{ $pedido->entrega->entrega}}</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white"
                                                data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    @if($pedido->status->id == 1)
                                        <div class="alert alert-success" role="alert">
                                            Pago
                                        </div>
                                    @elseif($pedido->status->id == 2)
                                        <div class="alert alert-warning" role="alert">
                                            Pendente
                                        </div>
                                    @endif
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                            </div>
                        </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    {{$pedidos->links()}}
</div>
</div>
</div>
</div>
</div>
@endsection
