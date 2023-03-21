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
                    <div class="col-12">
                        <div class="card border shadow-xs mb-4">
                            <div class="card-header border-bottom pb-0">
                                <div class="d-sm-flex align-items-center mb-3">
                                    <div>
                                        <h6 class="font-weight-semibold text-lg mb-0">Produtos</h6>
                                    </div>
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
                                            <input type="text" class="form-control form-control-sm" placeholder="Search">
                                        </div>
                                        <button type="button"
                                            class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2">
                                            <span class="btn-inner--icon">
                                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="d-block me-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </span>
                                            <span class="btn-inner--text">Download</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 py-0">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome
                                                    Produto
                                                </th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                    Fornecedor</th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Valor Unitário</th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Valor Bruto</th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Estoque</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produtos as $produto)
                                            <tr>

                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{ $produto->nome }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $produto->fornecedor->first()->nome ?? 'Sem papel definido' }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $produto->valor_unitario }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $produto->valor_bruto }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $produto->quantidade }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="border-top py-3 px-3 d-flex align-items-center">
                                    <button class="btn btn-sm btn-white d-sm-block d-none mb-0">Previous</button>
                                    <nav aria-label="..." class="ms-auto">
                                        <ul class="pagination pagination-light mb-0">
                                            <li class="page-item active" aria-current="page">
                                                <span class="page-link font-weight-bold">1</span>
                                            </li>
                                            <li class="page-item"><a class="page-link border-0 font-weight-bold"
                                                    href="javascript:;">2</a></li>
                                            <li class="page-item"><a
                                                    class="page-link border-0 font-weight-bold d-sm-inline-flex d-none"
                                                    href="javascript:;">3</a></li>
                                            <li class="page-item"><a class="page-link border-0 font-weight-bold"
                                                    href="javascript:;">...</a></li>
                                            <li class="page-item"><a
                                                    class="page-link border-0 font-weight-bold d-sm-inline-flex d-none"
                                                    href="javascript:;">8</a></li>
                                            <li class="page-item"><a class="page-link border-0 font-weight-bold"
                                                    href="javascript:;">9</a></li>
                                            <li class="page-item"><a class="page-link border-0 font-weight-bold"
                                                    href="javascript:;">10</a></li>
                                        </ul>
                                    </nav>
                                    <button class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-auto">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
