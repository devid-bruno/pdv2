@extends('layouts.header')
@section('content')
<body class="g-sidenav-show  bg-gray-100">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
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
                      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{asset("img/team-2.jpg")}}" class="avatar avatar-sm" alt="avatar" />
                      </a>
                      <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Sign out</a></li>
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
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Cadastro de Produto</h2>
            </div>
            <div class="row g-5">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Informações do produto</h4>
                    <form class="needs-validation" method="POST" action="{{route('add.produtos')}}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nome Produto</label>
                                <input type="text" class="form-control" id="firstName" name="nome_produto"
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-md-5">
                                    <label for="country" class="form-label">Lista de Fornecedor</label>
                                    <select name="fornecedor_id" id="fornecedor_id" class="form-control" required>
                                        <option value="">Selecione uma opção</option>
                                        @foreach($fornecedor as $fornecedores)
                                          <option value="{{ $fornecedores->id }}" {{ $fornecedores->id == old('fornecedor_id') ? 'selected' : '' }}>
                                            {{ $fornecedores->nome_fornecedor }}
                                          </option>
                                        @endforeach
                                      </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Quantidade</label>
                                <input type="number" name="quantidade" class="form-control" id="firstName"
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Marca</label>
                                <input type="text" name="marca" class="form-control" id="firstName"
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Descrição</label>
                                <input type="text" name="descricao" class="form-control" id="firstName" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Tipo de entrega feita pelo Fornecedor</label>
                                <input type="text" name="tipo_entrega" class="form-control" id="firstName" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        <hr class="my-4">
                        <div class="py-5 text-center">
                            <h2>Forma de pagamento que foi efetuado ao Fornecedor</h2>
                        </div>

                        <hr class="my-4">

                        <div class="my-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Tipo de pagamento feita ao Fornecedor</label>
                                <input type="text" name="tipo_pagamento" class="form-control" id="firstName" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Valor unitário</label>
                                <input type="text" name="valor_unitario" class="form-control" id="firstName" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Valor total</label>
                                <input type="text" name="valor_total" class="form-control" id="firstName" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Cadastrar produto</button>
                    </form>
                </div>
            </div>
        </main>
    @endsection
