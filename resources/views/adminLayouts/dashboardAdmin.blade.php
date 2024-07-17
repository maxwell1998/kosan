<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Admin</title>

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <!-- My Styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}" />
    <link rel="stylesheet" href="css/aos.css">

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <aside id="sidebar" class="expand">
        <div class="d-flex">
          <button class="toggle-btn" type="button">
            <i class="fa-solid fa-bars"></i>
          </button>
          <div class="sidebar-logo">
            <a href="/">FAW <span>KosTel</span></a>
          </div>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-item">
            <a href="/admin" class="sidebar-link">
              <i class="fa-solid fa-people-roof"></i></i>
              <span>Manajemen Kost</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="/penghuni" class="sidebar-link">
              <i class="fa-solid fa-users"></i>
              <span>Penghuni</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              href="#"
              class="sidebar-link collapsed has-dropdown"
              data-bs-toggle="collapse"
              data-bs-target="#auth"
              aria-expanded="false"
              aria-controls="auth"
            >
              <i class="fa-solid fa-door-open"></i>
              <span>Kamar</span>
            </a>
            <ul
              id="auth"
              class="sidebar-dropdown list-unstyled collapse"
              data-bs-parent="#sidebar"
            >
              <li class="sidebar-item">
                <a href="/jnsKamar" class="sidebar-link">Jenis Kamar</a>
              </li>
              <li class="sidebar-item">
                <a href="/jmlhKamar" class="sidebar-link">Jumlah Kamar</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="/keuangan" class="sidebar-link">
              <i class="fa-solid fa-money-bill-transfer"></i>
              <span>Keuangan</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="/feeback" class="sidebar-link">
              <i class="fa-solid fa-comment"></i>
              <span>Keluhan</span>
            </a>
          </li>
        </ul>
        <div class="sidebar-footer">
          <a href="/" class="sidebar-link">
            <i class="fa-solid fa-house"></i>
            <span>Kembali ke Home</span>
          </a>
        </div>
        <div class="sidebar-footer">
          <a href="/logout" class="sidebar-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
          </a>
        </div>
      </aside>
      <div class="main">
        @yield('container')
      </div>
    </div>

    {{-- My Javascript --}}
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('javascript/dashboardAdmin.js') }}"></script>
    <script src="{{ asset('javascript/aos.js') }}"></script>

    {{-- Activision On Scroll --}}
    <script>
      AOS.init();
    </script>
  </body>
</html>
