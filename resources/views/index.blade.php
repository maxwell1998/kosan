<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAW Kostel</title>

    <!-- My Style -->
    <link rel="stylesheet" href="css/homepage.css" />

    <!-- Font Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Macondo&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Animation On Scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
  </head>
  <body>
    @if(session()->has('dashboardError'))
    <script>
      alert('{{ session('dashboardError') }}')
    </script>
    @endif
    @if(session()->has('sewaError'))
    <script>
      alert('{{ session('sewaError') }}')
    </script>
    @endif
    @if(session()->has('tenantError'))
    <script>
      alert('{{ session('tenantError') }}')
    </script>
    @endif
    @if(session()->has('sewaRejected'))
    <script>
      alert('{{ session('sewaRejected') }}')
    </script>
    @endif
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">FAW <span>KosTel</span></a>
      <div class="navbar-nav">
        <a href="#home">Beranda</a>
        <a href="#about">Tentang Kami</a>
        <a href="#room">Kamar</a>
        <a href="#contact">Hubungi Kami</a>
      </div>
      <div class="navbar-extra">
      @auth
      <a href="/dashboard" id="account-extra"><span></span>Dashboard <i class="fa-solid fa-user"></i></a>
      <a href="/logout" id="account-extra"><span></span>Log Out <i class="fa-solid fa-right-from-bracket"></i></a>
      @else
        <a href="/login" id="account-extra"><span></span>Masuk</a>
        <a href="/register" id="account-extra"><span></span>Daftar</a>
      @endauth
        <a href="#" id="hamburger-menu"><i class="fa-solid fa-bars"></i></a>
      </div>
    </nav>
    <!-- Navbar End -->
    <!-- Hero Section Start -->
    <section class="hero" id="home">
      <main class="content" data-aos="fade-right" data-aos-duration="1500">
        <h1>Penginapan <span>Murah</span> & <span>Nyaman</span> Ada Di Sini</h1>
        <p>Nikmati Penginapan FAW KosTel Mulai 100rb-an.</p>
        <a href="#room" class="cta">Pilih Kamar</a>
      </main>
    </section>
    <!-- Hero Section End -->
    <!-- About Section Start -->
    <section class="about" id="about">
      <h2><span>Tentang</span> Kami</h2>
      <div class="row" data-aos="zoom-in" data-aos-duration="1500">
        <div class="about-img">
          <img src="assets/Logo.jpg" alt="Tentang Kami" />
        </div>
        <div class="content">
          <h3>Kenapa memilih tempat kami?</h3>
          <p>
            FAW Kostel memulai operasinya dari tahun 2022 yang kini sudah memiliki 16 kamar yang siap huni, nyaman, dan full fasilitas serta layanan layaknya hotel
          </p>
          <p>
            Kostel sendiri di ambil sebagai referensi layanan penginapan layaknya hotel bintang tiga dengan harga yang sangat terjangkau.
          </p>
        </div>
      </div>
    </section>
    <!-- About Section End -->   
    <!-- Room Section Start -->
    <section class="room" id="room">
      <h2><span>Daftar</span> Kamar</h2>
      
      <div class="card-container">
        @foreach ( $categories as $category )
        <div class="card" data-aos="flip-right" data-aos-duration="1500">
          @if ($category->image)
          <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}" />
          @else
          <img src="assets/Logo.jpg" alt="{{ $category->name }}" />
          @endif
          <div class="card-content">
            <h2>{{ $category->name }}</h2>
            <p id="fasilitas">
              Fasilitas:<br />
              <span>{{ $category->fasilitas }}</span>
            </p>
            <p id="list-harga">
              Harga:<br />
              <span>
                <i class="fa-solid fa-tag"></i> IDR. {{ $category->priceDay }} / Day<br />
                <i class="fa-solid fa-tag"></i> IDR. {{ $category->priceWeek }} / Week<br />
                <i class="fa-solid fa-tag"></i> IDR. {{ $category->priceMonth }} / Month<br />
              </span>
            </p>
            @if ($category->available_rooms === "Tersedia")
            <a href="/sewa-{{ $category->id }}" class="btn">Sewa Sekarang</a>
            @else
            <a class="btn-penuh">Sudah Penuh</a>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </section>
    <!-- Room Section End -->
    <!-- Contact Section Start -->
    <section class="contact" id="contact">
      <h2><span>Hubungi</span> Kami</h2>
      <div class="row" data-aos="fade-up" data-aos-duration="1500">
        <div class="contact-location">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.3277169743517!2d100.35131676957884!3d-0.9138256590078428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8cb7a9878bd%3A0xcabe9c9df2c19c6e!2sJl.%20Medan%20No.13%2C%20Ulak%20Karang%20Sel.%2C%20Kec.%20Padang%20Utara%2C%20Kota%20Padang%2C%20Sumatera%20Barat%2025134!5e0!3m2!1sid!2sid!4v1715946851958!5m2!1sid!2sid"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
        <div class="content">
          <h3>Lokasi:</h3>
          <p id="location-desc">
            Jalan Medan Nomor 13 Ulak Karang Selatan., Kecamatan Padang Utara.
            Kota Padang. Sumatera Barat
          </p>
          <p id="contact-list">
            | <i class="fa-brands fa-square-whatsapp"></i
            ><a href="https://wa.me/+62895384814634"> +62 895-3848-14634</a> |
            <i class="fa-solid fa-envelope"></i>
            <a
              href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=fawkostel@gmail.com"
              >fawkostel@gmail.com</a
            >
            |
          </p>
        </div>
      </div>
    </section>
    <!-- Contact Section End -->
    <!-- Footer Start -->
    <footer>
      <div class="socials">
        <a href="https://www.instagram.com/faw_kostel_vvipkotapadang/"
          ><i class="fa-brands fa-instagram"></i
        ></a>
        <a href="https://www.facebook.com/profile.php?id=61550575480186"
          ><i class="fa-brands fa-facebook"></i
        ></a>
        <a href="https://www.tiktok.com/@faw.kostel"
          ><i class="fa-brands fa-tiktok"></i
        ></a>
      </div>
      <div class="links">
        <a href="#home">Beranda</a>
        <a href="#about">Tentang Kami</a>
        <a href="#room">Kamar</a>
        <a href="/coba">Hubungi Kami</a>
      </div>
      <div class="credits">
        <p>
          Created by <a href="https://wa.me/+6282169564461">maxwellarabil</a>. |
          &copy; 2024.
        </p>
      </div>
    </footer>
    <!-- Footer End -->
    <!-- My Javascript -->
    <script src="javascript/homepage.js"></script>

    <!-- Animation On Scroll -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
