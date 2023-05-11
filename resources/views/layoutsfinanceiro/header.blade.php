<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
  <title>
    Financeiro
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{ asset('css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }
    .bd-mode-toggle {
      z-index: 1500;
    }

  </style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 fixed-start ps bg-white" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand d-flex align-items-center m-0" href="{{route('users')}}">
        <span class="font-weight-bold text-lg">Sistema</span>
      </a>
    </div>
    <div class="flex-shrink-0 p-3" style="width: 280px;">
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    Despesas
                </button>
                <div class="collapse" id="home-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route("financeiro.despesas")}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Listar</a></li>
                    <li><a href="{{route("categoria.adicionar")}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Adicionar</a></li>
                  </ul>
                </div>
              </li>
              {{-- <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                  Fornecedores
                </button>
                <div class="collapse" id="dashboard-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('fornecedor.lista')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
                    <li><a href="{{route('fornecedor.add')}}" class="link-dark d-inline-flex text-decoration-none rounded">Adicionar</a></li>
                </ul>
                </div>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#order-collapse" aria-expanded="true">
                  Produtos
                </button>
                <div class="collapse" id="order-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('produto.lista')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
                    <li><a href="{{route('quantidade.add')}}" class="link-dark d-inline-flex text-decoration-none rounded">Estoque</a></li>
                    <li><a href="{{route('produto.add')}}" class="link-dark d-inline-flex text-decoration-none rounded">Adicionar</a></li>
                </ul>
                </div>
              </li>
              <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#-collapse" aria-expanded="true">
                  Pedidos
                </button>
                <div class="collapse" id="-collapse">
                  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{route('pedido.lista')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
                    <li><a href="{{route('pedido.add')}}" class="link-dark d-inline-flex text-decoration-none rounded">Adicionar</a></li>
                  </ul>
                </div>
              </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#ome-collapse" aria-expanded="true">
              Usuários
            </button>
            <div class="collapse" id="ome-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{route('adicionar')}}" class="link-dark d-inline-flex text-decoration-none rounded">Adicionar</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#e-collapse" aria-expanded="true">
              Clientes
            </button>
            <div class="collapse" id="e-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{route('clientes')}}" class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#Financeiro-collapse" aria-expanded="true">
              Financeiro
            </button>
            <div class="collapse" id="Financeiro-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{route('financeiro.home')}}" class="link-dark d-inline-flex text-decoration-none rounded">Despesas</a></li>
              </ul>
            </div>
          </li> --}}
        </ul>
    </div>
  </aside>

@yield('content')


</div>
</main>

<!--   Core JS Files   -->
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
<script src="{{asset("js/plugins/swiper-bundle.min.js")}}" type="text/javascript"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    // Seleciona os campos de valor unitário, quantidade e valor total
    var valorUnitario = document.querySelector('input[name="valor_unitario"]');
    var quantidade = document.querySelector('input[name="quantidade"]');
    var valorTotal = document.querySelector('#valor_total');

    // Adiciona um evento "change" aos campos de valor unitário e quantidade
    valorUnitario.addEventListener('change', atualizaValorTotal);
    quantidade.addEventListener('change', atualizaValorTotal);

    // Função para atualizar o valor total com base no valor unitário e quantidade
    function atualizaValorTotal() {
        var valorUnitarioFloat = parseFloat(valorUnitario.value);
        var quantidadeInt = parseInt(quantidade.value);
        var valorTotalFloat = valorUnitarioFloat * quantidadeInt;
        valorTotal.value = valorTotalFloat.toFixed(2); // Arredonda para 2 casas decimais
    }
</script>
<script src="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.js"></script>
<script src="{{ asset('js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
</body>

</html>
