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
        <div class="container-fluid py-4 px-5">
            <div class="row">
              <div class="col-12">
                <div class="card border shadow-xs mb-4">
                  <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center">
                      <div>
                        <h6 class="font-weight-semibold text-lg mb-0">Members list</h6>
                        <p class="text-sm">See information about all members</p>
                      </div>
                      <div class="ms-auto d-flex">
                        <button type="button" class="btn btn-sm btn-white me-2">
                          View all
                        </button>
                        <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">
                          <span class="btn-inner--icon">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                              <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                            </svg>
                          </span>
                          <span class="btn-inner--text">Add member</span>
                        </button>
                      </div>
                    </div>
                  </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content">
                          <div class="p-0 modal-body">
                            <div class="card card-plain">
                              <div class="pb-0 text-left card-header">
                                  <h3 class="font-weight-bolder text-dark">Sign up</h3>
                                  <p class="mb-0">Enter your email and password to register</p>
                              </div>
                              <div class="pb-3 card-body">
                                <form role="form text-left">
                                  <label>Name</label>
                                  <div class="mb-3 input-group">
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                                  </div>
                                  <label>Email</label>
                                  <div class="mb-3 input-group">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                  </div>
                                  <label>Password</label>
                                  <div class="mb-3 input-group">
                                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                  </div>
                                  <div class="text-left form-check form-check-info">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked="">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      I agree the <a href="javascrpt:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                    </label>
                                  </div>
                                  <div class="text-center">
                                    <button type="button" class="mt-4 mb-0 btn btn-dark btn-lg btn-rounded w-100">Sign up</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                  <div class="card-body px-0 py-0">
                    <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off" checked>
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable1">All</label>
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Monitored</label>
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Unmonitored</label>
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
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead class="bg-gray-100">
                          <tr>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Member</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Function</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Employed</th>
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
                                  <h6 class="mb-0 text-sm font-weight-semibold">John Michael</h6>
                                  <p class="text-sm text-secondary mb-0">john@creative-tim.com</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-sm text-dark font-weight-semibold mb-0">Manager</p>
                              <p class="text-sm text-secondary mb-0">Organization</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm border border-success text-success bg-success">Online</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-sm font-weight-normal">23/04/18</span>
                            </td>
                            <td class="align-middle">
                              <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                                </svg>
                              </a>
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
        <!--
     -->
    @endsection
