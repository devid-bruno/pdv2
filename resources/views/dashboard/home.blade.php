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
                <hr class="my-0">
                <div class="row">
                    <div class="position-relative overflow-hidden">
                        <div class="swiper mySwiper mt-4 mb-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('img/cartao.png') }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-8 col-md-6">
                        <div class="card shadow-xs border">
                            <div class="card-header border-bottom pb-0">
                                <div class="d-sm-flex align-items-center mb-3">
                                    <div>
                                        <h6 class="text-center font-weight-semibold text-lg mb-0">Vendas</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 py-0">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7">Produto
                                                </th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                    Valor por unidade</th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                    Quantidade</th>
                                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                    Valor total vendido</th>
                                                <th
                                                    class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pedidos as $pedido)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{$pedido->produto->nome_produto}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-normal mb-0">R$: {{number_format($pedido->valor_unitario, 2, ',', '.')}}</p>
                                                </td>
                                                <td>
                                                    <span class="text-sm font-weight-normal">{{number_format($pedido->quantidade, 2, ',', '.')}}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="d-flex">
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-dark text-sm mb-0">R$: {{number_format($pedido->valor_total, 2, ',', '.')}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                                    <path fill-rule="evenodd"
                                        d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Venda diaria</p>
                                        <h4 class="mb-2 font-weight-bold">R$ {{ $valor_diaria }}</h4>
                                        <div class="d-flex align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Venda Anual</p>
                                        <h4 class="mb-2 font-weight-bold">R$ {{ number_format($valorTotalanual, 2, ',', '.') }}</h4>
                                        <div class="d-flex align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Venda Mensal</p>
                                        <h4 class="mb-2 font-weight-bold">R$ {{number_format($valorTotalmes, 2, ',', '.')  }}</h4>
                                        <div class="d-flex align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Venda semanal</p>
                                        <h4 class="mb-2 font-weight-bold">R$ {{number_format($valorTotal, 2, ',', '.')  }}</h4>
                                        <div class="d-flex align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                      <div class="d-sm-flex align-items-center">
                        <div>
                          <h6 class="font-weight-semibold text-lg mb-0">Resumo Financeiro</h6>
                        </div>
                        <div class="ms-auto d-flex">
                        </div>
                      </div>
                    </div>
                    <div class="card-body px-0 py-0">
                      <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                        <form class="mt-4 mb-4 form-inline">
                            <div class="form-group mr-2 d-inline-block">
                                <label for="data-inicio">Data Início:</label>
                                <input type="date" class="form-control" id="data-inicio" name="data-inicio">
                            </div>
                            <div class="form-group mr-2 d-inline-block">
                                <label for="data-fim">Data Fim:</label>
                                <input type="date" class="form-control" id="data-fim" name="data-fim">
                            </div>
                            <br>
                            <button type="button" class="btn btn-primary d-inline-block" onclick="filtrar()">Filtrar</button>
                        </form>
                      </div>
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead class="bg-gray-100">
                            <tr>
                              <th class="text-secondary text-xs font-weight-semibold opacity-7">Diário</th>
                              <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Semanal</th>
                              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Mensal</th>
                              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Anual</th>
                              <th class="text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex align-items-center">
                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user1">
                                  </div>
                                  <div class="d-flex flex-column justify-content-center ms-1">
                                    <h6 class="mb-0 text-sm font-weight-semibold">R$ 35,00</h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-sm text-dark font-weight-semibold mb-0">R$ 245,00</p>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <p class="text-sm text-dark font-weight-semibold mb-0">R$ 980,00</p>
                              </td>
                              <td class="align-middle text-center">
                                <p class="text-sm text-dark font-weight-semibold mb-0">R$ 11.760,00</p>
                              </td>
                            </tr>
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
