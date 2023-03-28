<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
  <title>
    Corporate UI by Creative Tim
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{ asset('css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>

<div class="row my-4">
    <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
      <div class="card shadow-xs border h-100">
        <div class="card-header pb-0">
          <h6 class="font-weight-semibold text-lg mb-0">Vendas</h6>
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-white px-3 mb-0" id="filter-12meses"for="btnradio1">12 Meses</label>
            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-white px-3 mb-0" id="filter-30dias" for="btnradio2">30 dias</label>
            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-white px-3 mb-0" id="filter-7dias" for="btnradio3">7 dias</label>
          </div>
        </div>
        <div class="card-body py-3">
          <div class="chart mb-2">
            <canvas id="chart-bars" class="chart-canvas" height="240"></canvas>
          </div>
        </div>
      </div>
    </div>
    </div>


<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
<script src="{{asset("js/plugins/swiper-bundle.min.js")}}" type="text/javascript"></script>
<script>
if (document.getElementsByClassName('mySwiper')) {
  var swiper = new Swiper(".mySwiper", {
    effect: "cards",
    grabCursor: true,
    initialSlide: 1,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
};


var ctx = document.getElementById("chart-bars").getContext("2d");
var chartData = {!! $chartData !!};
new Chart(ctx, {
  type: "bar",
  data: chartData,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      },
      tooltip: {
        backgroundColor: '#fff',
        titleColor: '#1e293b',
        bodyColor: '#1e293b',
        borderColor: '#e9ecef',
        borderWidth: 1,
        usePointStyle: true
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        stacked: true,
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [4, 4],
        },
        ticks: {
          beginAtZero: true,
          padding: 10,
          font: {
            size: 12,
            family: "Noto Sans",
            style: 'normal',
            lineHeight: 2
          },
          color: "#64748B"
        },
      },
      x: {
        stacked: true,
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false
        },
        ticks: {
          font: {
            size: 12,
            family: "Noto Sans",
            style: 'normal',
            lineHeight: 2
          },
          color: "#64748B"
        },
      },
    },
  },
});
</script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ asset('js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
</body>

</html>
