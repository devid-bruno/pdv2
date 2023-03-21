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


                    <form method="post" action="{{ route('fornecedor.criar') }}">
                        @csrf
                        <div class="container-fluid py-4 px-5">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome Fornecedor</label>
                                            <input type="text" name="nome" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Nome Fornecedor">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Fornecedor</label>
                                            <input type="email" name="email" placeholder="Email fornecedor" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Selecione Categoria para o Fornecedor</label>
                                            <div class="input-group">
                                                <select class="form-select" name="categoria_id" id="categoria_id">
                                                    @foreach ($categorias as $categoria)
                                                        <option value="{{ $categoria->id }}">
                                                            {{ $categoria->categoria }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telefone Fornecedor</label>
                                            <div class="input-group">
                                                <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label>CNPJ Fornecedor</label>
                                            <input type="text" name="cnpj" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label>Descrição Produto</label>
                                            <input type="text" name="descricao"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label>Endereço Fornecedor</label>
                                            <input type="text" name="endereco"
                                                class="form-control" />
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
