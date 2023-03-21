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
      <hr class="my-0">
      <div class="row">
        <div class="position-relative overflow-hidden">
          <div class="swiper mySwiper mt-4 mb-2">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div>
                  <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                    <div class="full-background bg-cover" style="background-image: url({{asset('img/img-2.jpg')}})"></div>
                    <div class="card-body text-start px-3 py-0 w-100">
                      <div class="row mt-12">
                        <div class="col-sm-3 mt-auto">
                          <h4 class="text-dark font-weight-bolder">#1</h4>
                          <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                          <h5 class="text-dark font-weight-bolder">Secured</h5>
                        </div>
                        <div class="col-sm-3 ms-auto mt-auto">
                          <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                          <h5 class="text-dark font-weight-bolder">Banking</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                  <div class="full-background bg-cover" style="background-image: url({{asset('img/img-1.jpg')}})"></div>
                  <div class="card-body text-start px-3 py-0 w-100">
                    <div class="row mt-12">
                      <div class="col-sm-3 mt-auto">
                        <h4 class="text-dark font-weight-bolder">#2</h4>
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                        <h5 class="text-dark font-weight-bolder">Cyber</h5>
                      </div>
                      <div class="col-sm-3 ms-auto mt-auto">
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                        <h5 class="text-dark font-weight-bolder">Security</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                  <div class="full-background bg-cover" style="background-image: url('{{asset('img/img-3.jpg')}}')"></div>
                  <div class="card-body text-start px-3 py-0 w-100">
                    <div class="row mt-12">
                      <div class="col-sm-3 mt-auto">
                        <h4 class="text-dark font-weight-bolder">#3</h4>
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                        <h5 class="text-dark font-weight-bolder">Alpha</h5>
                      </div>
                      <div class="col-sm-3 ms-auto mt-auto">
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                        <h5 class="text-dark font-weight-bolder">Blockchain</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                  <div class="full-background bg-cover" style="background-image: url('{{asset('img/img-4.jpg')}}')"></div>
                  <div class="card-body text-start px-3 py-0 w-100">
                    <div class="row mt-12">
                      <div class="col-sm-3 mt-auto">
                        <h4 class="text-dark font-weight-bolder">#4</h4>
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                        <h5 class="text-dark font-weight-bolder">Beta</h5>
                      </div>
                      <div class="col-sm-3 ms-auto mt-auto">
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                        <h5 class="text-dark font-weight-bolder">Web3</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                  <div class="full-background bg-cover" style="background-image: url('{{asset('img/img-5.jpg')}}')"></div>
                  <div class="card-body text-start px-3 py-0 w-100">
                    <div class="row mt-12">
                      <div class="col-sm-3 mt-auto">
                        <h4 class="text-dark font-weight-bolder">#5</h4>
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                        <h5 class="text-dark font-weight-bolder">Gama</h5>
                      </div>
                      <div class="col-sm-3 ms-auto mt-auto">
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                        <h5 class="text-dark font-weight-bolder">Design</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                  <div class="full-background bg-cover" style="background-image: url('{{asset('img/img-1.jpg')}}')"></div>
                  <div class="card-body text-start px-3 py-0 w-100">
                    <div class="row mt-12">
                      <div class="col-sm-3 mt-auto">
                        <h4 class="text-dark font-weight-bolder">#6</h4>
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                        <h5 class="text-dark font-weight-bolder">Rompro</h5>
                      </div>
                      <div class="col-sm-3 ms-auto mt-auto">
                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                        <h5 class="text-dark font-weight-bolder">Security</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
          <div class="card shadow-xs border h-100">
            <div class="card-header pb-0">
              <h6 class="font-weight-semibold text-lg mb-0">Vendas</h6>
              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-white px-3 mb-0" for="btnradio1">12 Meses</label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-white px-3 mb-0" for="btnradio2">30 dias</label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-white px-3 mb-0" for="btnradio3">7 dias</label>
              </div>
            </div>
            <div class="card-body py-3">
              <div class="chart mb-2">
                <canvas id="chart-bars" class="chart-canvas" height="240"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-6">
          <div class="card shadow-xs border">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Venda por operador</h6>
                  <p class="text-sm mb-sm-0 mb-2">Selecione ou pesquise o vendedor</p>
                </div>
                <div class="ms-auto d-flex">
                  <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                    <span class="btn-inner--icon">
                      <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                      </svg>
                    </span>
                    <span class="btn-inner--text">fluxo de venda por usuário</span>
                  </button>
                </div>
              </div>
              <div class="pb-3 d-sm-flex align-items-center">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off" checked>
                  <label class="btn btn-white px-3 mb-0" for="btnradiotable1">Todos</label>
                </div>
                <div class="input-group w-sm-25 ms-auto">
                  <span class="input-group-text text-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </span>
                  <input type="text" class="form-control" placeholder="Search">
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Produto</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Valor por unidade</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Quantidade</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Valor total vendido</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                            <img src="{{asset("img/small-logos/logo-spotify.svg")}}" class="w-80" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Cimento</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-normal mb-0">R$31,50</p>
                      </td>
                      <td>
                        <span class="text-sm font-weight-normal">50 unidades</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          </div>
                          <div class="ms-2">
                            <p class="text-dark text-sm mb-0">1.575</p>
                          </div>
                        </div>
                      </td>
                    </tr>
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
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                  <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Venda diaria</p>
                    <h4 class="mb-2 font-weight-bold">R$257</h4>
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
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                  <path d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                </svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Venda Anual</p>
                    <h4 class="mb-2 font-weight-bold">R$99,118.5</h4>
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
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Venda Mensal</p>
                    <h4 class="mb-2 font-weight-bold">R$7.967</h4>
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
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Venda semanal</p>
                    <h4 class="mb-2 font-weight-bold">$1.991,75</h4>
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
        <div class="col-lg-12">
          <div class="card shadow-xs border">
            <div class="card-header pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Fluxo de vendas</h6>
                  <p class="text-sm mb-sm-0 mb-2">Fluxo do produto que mais vendeu no mês</p>
                </div>
                <div class="ms-auto d-flex">
                  <button type="button" class="btn btn-sm btn-white mb-0 me-2">
                    View report
                  </button>
                </div>
              </div>
              <div class="d-sm-flex align-items-center">
                <h3 class="mb-0 font-weight-semibold">$87,982.80</h3>
                <span class="badge badge-sm border border-success text-success bg-success border-radius-sm ms-sm-3 px-2">
                  <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.46967 4.46967C0.176777 4.76256 0.176777 5.23744 0.46967 5.53033C0.762563 5.82322 1.23744 5.82322 1.53033 5.53033L0.46967 4.46967ZM5.53033 1.53033C5.82322 1.23744 5.82322 0.762563 5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967L5.53033 1.53033ZM5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967C4.17678 0.762563 4.17678 1.23744 4.46967 1.53033L5.53033 0.46967ZM8.46967 5.53033C8.76256 5.82322 9.23744 5.82322 9.53033 5.53033C9.82322 5.23744 9.82322 4.76256 9.53033 4.46967L8.46967 5.53033ZM1.53033 5.53033L5.53033 1.53033L4.46967 0.46967L0.46967 4.46967L1.53033 5.53033ZM4.46967 1.53033L8.46967 5.53033L9.53033 4.46967L5.53033 0.46967L4.46967 1.53033Z" fill="#67C23A"></path>
                  </svg>
                  10.5%
                </span>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="chart mt-n6">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
