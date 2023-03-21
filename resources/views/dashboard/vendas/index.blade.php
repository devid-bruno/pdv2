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
                <div class="pb-3 card-body">
                    <form method="post" action="{{route('index.vender')}}">
                        @csrf
                        <div class="container-fluid py-4 px-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Selecione o Cliente</label>
                                            <select class="form-select" name="" id="">
                                                @foreach ($clientes as $cliente)
                                                <option value="{{$cliente->id}}">{{$cliente->nome_cliente}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Selecione o produto</label>
                                            <div class="input-group">
                                                <select class="form-select" name="" id="">
                                                    @foreach ($produtos as $produto)
                                                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Valor Total</label>
                                            <div class="input-group">
                                                <input type="text" name="valor_total" class="form-control" placeholder="Valor Total">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Forma Pagamento</label>
                                            <div class="input-group">
                                                <input type="text" name="forma_pagamento" class="form-control" placeholder="Forma Pagamento">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Quantidade</label>
                                            <div class="input-group">
                                                <input type="text" name="estoque_id" class="form-control" placeholder="Quantidade">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark">Cadastrar</button>
                                  </div>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
