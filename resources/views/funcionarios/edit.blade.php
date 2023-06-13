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
                <div class="card" style="width: 18rem;">
                    <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
                         @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">nome:</label>
                          <input type="text" name="nome" value="{{ $funcionario->nome }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="data_contratacao">Data Contratação</label>
                          <input type="text" name="data_contratacao" value="{{ $funcionario->data_contratacao }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Salário:</label>
                          <input type="number" name="salario_bruto" value="{{ $funcionario->salario_bruto }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Função:</label>
                            <input type="text" name="funcao" value="{{ $funcionario->funcao }}" class="form-control" required>
                          </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                      </form>
                    </div>
                  </div>

                @endsection
