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
                                <div class="d-sm-flex align-items-center mb-3">
                                    <div>
                                        <h6 class="font-weight-semibold text-lg mb-0">Produtos</h6>
                                    </div>
                                </div>
                            </div>
                            @if (session('atualiza'))
                                <div class="alert alert-success">
                                    {{ session('atualiza') }}
                                </div>
                            @endif
                            <div class="card-body px-0 py-0">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome
                                                    Produto
                                                </th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                    Marca Produto</th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                    Descrição Produto</th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                    Fornecedor</th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                    ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produtos as $produto)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{ $produto->nome_produto }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $produto->marca_produto }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $produto->descricao_produto }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-normal mb-0">
                                                            {{ $produto->fornecedor->nome ?? '' }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $produto->id }}">
                                                            <i class="fa-sharp fa-solid fa-eye"></i>
                                                        </button>
                                                        <form id="form_{{ $produto->id }}"
                                                            action="{{ route('produto.excluir', $produto->id) }}"
                                                            method="post"
                                                            onsubmit="return confirm('Tem certeza que deseja excluir este registro?');">
                                                            @method('DELETE')
                                                            @csrf
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
                                                        <div class="modal fade" id="exampleModal{{ $produto->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            todos detalhes</h5>
                                                                        <button type="button" class="btn-close text-dark"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="text-sm font-weight-normal mb-0">Estoque:
                                                                            {{ $produto->estoque->quantidade ?? 'sem valor' }}
                                                                        </p>
                                                                        <p class="text-sm font-weight-normal mb-0">Valor
                                                                            Unitário: <strong>R$:
                                                                                {{ $produto->estoque->valor_unitario ?? 'sem valor' }}</strong>
                                                                        </p>
                                                                        <p class="text-sm font-weight-normal mb-0">Valor
                                                                            Total: <strong>R$:
                                                                                {{ $produto->estoque->valor_total ?? 'sem valor' }}</strong>
                                                                        </p>
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
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{$produtos->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
