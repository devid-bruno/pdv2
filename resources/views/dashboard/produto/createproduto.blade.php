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
                <div class="pb-3 card-body">


                    <form method="post" action="{{route('produto.criar')}}">
                        @csrf
                        <div class="container-fluid py-4 px-5">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome Produto</label>
                                            <input type="text" name="nome_produto" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Nome Produto">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Descrição produto</label>
                                            <input type="text" name="descricao_produto" placeholder="Descrição produto" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Marca produto</label>
                                            <input type="text" name="marca_produto" placeholder="Marca produto" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Selecione o Fornecedor</label>
                                            <select class="form-select" name="fornecedor_id" id="fornecedor_id">
                                                @foreach ($fornecedores as $fornecedor)
                                                    <option value="{{ $fornecedor->id }}">
                                                        {{ $fornecedor->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark">Cadastrar</button>
                                  </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
