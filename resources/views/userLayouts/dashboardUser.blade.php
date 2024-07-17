<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | User</title>

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <!-- My Styles -->
    <link rel="stylesheet" href="css/dashboardUser.css" />
    <link rel="stylesheet" href="css/aos.css">

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
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
            <a href="/user" class="sidebar-link">
              <i class="fa-solid fa-user"></i>
              <span>Profil</span>
            </a>
          </li>
          @can('userActive')
          <li class="sidebar-item">
            <a href="/durasi" class="sidebar-link">
              <i class="fa-regular fa-hourglass-half"></i>
              <span>Durasi Sewa</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="/keluhan" class="sidebar-link">
              <i class="fa-solid fa-comment"></i>
              <span>Keluhan</span>
            </a>
          </li>
          @endcan
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
      <div class="main p-3">
        @yield('container')
      </div>
    </div>
  
    
    {{-- My Javascript --}}
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="javascript/dashboardUser.js"></script>
    <script src="javascript/aos.js"></script>
    <script src="https://github.com/VincentLoy/simplyCountdown.js/"></script>

    {{-- Simply Countdown --}}
<script>
  const tanggalElement = document.getElementById('last_duration');
  const tanggal = tanggalElement.value;

  simplyCountdown('.simply-countdown', {
    year: new Date(tanggal).getFullYear(),
    month: new Date(tanggal).getMonth() + 1,
    day: new Date(tanggal).getDate(),
    hours: 0, // Default is 0 [0-23] integer
    minutes: 0, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
      days: { singular: 'Hari', plural: 'Hari' },
      hours: { singular: 'Jam', plural: 'Jam' },
      minutes: { singular: 'Menit', plural: 'Menit' },
      seconds: { singular: 'Detik', plural: 'Detik' }
    }
  });
</script>

    {{-- Activision On Scroll --}}
    <script>
      AOS.init();
    </script>
  </body>
</html>
