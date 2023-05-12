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
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card shadow-xs border">
                        <div class="card-header pb-0">
                          <div class="d-sm-flex align-items-center mb-3">
                            <div>
                              <h6 class="font-weight-semibold text-lg mb-0">Receita</h6>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="{{route('gera.relatorio')}}"><button type="button"
                                    class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2">
                                     <span class="btn-inner--icon">
                                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="d-block me-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </span>
                                    <span class="btn-inner--text">Relatório</span>
                                </button></a>
                            </div>
                          </div>
                          <table class="table align-items-center justify-content-center mb-0">
                            <thead class="bg-gray-100">
                              <tr>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7">Produto</th>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Valor Total que vendemos</th>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Estoque unitário</th>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Total Quantidade vendido</th>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Faturamento</th>
                                {{--<th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Data Venda</th> --}}
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($produtoTotals as $nomeProduto => $produtoTotal)
                              <tr>
                                  <td>
                                      <div class="d-flex px-2">
                                          <div class="my-auto">
                                              <h6 class="mb-0 text-sm">{{$nomeProduto}}</h6>
                                          </div>
                                      </div>
                                  </td>
                                   <td>
                                      <div class="d-flex px-2">
                                          <div class="my-auto">
                                              <h6 class="mb-0 text-sm">R$: {{number_format($produtoTotal['valor_total'], 2, ',', '.')}}</h6>
                                          </div>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="d-flex px-2">
                                          <div class="my-auto">
                                              <h6 class="mb-0 text-sm">R$: {{number_format($produtoTotal['valor_unitario'], 2, ',', '.')}}</h6>
                                          </div>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="d-flex px-2">
                                          <div class="my-auto">
                                              <h6 class="mb-0 text-sm">{{$produtoTotal['quantidade']}}</h6>
                                          </div>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="d-flex px-2">
                                          <div class="my-auto">
                                              <h6 class="mb-0 text-sm">R$: {{number_format($produtoTotal['faturamento'], 2, ',', '.')}}</h6>
                                          </div>
                                      </div>
                                  </td>
                                  {{--<td>
                                      <div class="d-flex px-2">
                                          <div class="my-auto">
                                              <h6 class="mb-0 text-sm">{{ \DateTime::createFromFormat('Y-m-d', $pedido->data_venda)->format('d/m/Y') }}</h6>
                                          </div>
                                      </div>
                                  </td> --}}
                              </tr>
                          @endforeach
                          </tbody>
                          </table>
                          {{-- <div class="py-4">
                            {!! $pedidos->links() !!}
                        </div> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
            </div>
@endsection
