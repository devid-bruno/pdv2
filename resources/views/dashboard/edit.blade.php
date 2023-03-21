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
                <div class="card" style="width: 18rem;">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Nome:</label>
                          <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="email">E-mail:</label>
                          <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Senha:</label>
                          <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="password_confirmation">Confirmação de Senha:</label>
                          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="role_id">Função:</label>
                          <select name="role_id" id="role_id" class="form-control" required>
                            <option value="">Selecione uma opção</option>
                            @foreach($roles as $role)
                              <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                              </option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                      </form>
                    </div>
                  </div>

                @endsection
