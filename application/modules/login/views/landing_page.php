<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LMS -SISELO</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/images/logo/logo1.png') ?>" rel="icon">
  <link href="<?= base_url('assets/images/logo/logo1.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Baumans&family=Coda&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/home/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

    <img src="<?= base_url("assets/images/logo/logo1.png") ?>" alt="logo" width="150px">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="active"><a href="#hero">Beranda</a></li>
          <li><a href="#mahasiswa">Siswa</a></li>
          <li><a href="#dosen">Guru</a></li>
          <li><a href="<?= base_url('login/pengumuman') ?>">Pengumuman</a></li>


        </ul>

      </nav><!-- .nav-menu -->

      <!-- <a href="index.html" class="get-started-btn">Get Started</a> -->
      <a href="<?= base_url('login') ?>" class="login-btn ml-auto">Login</a>

    </div>
  </header><!-- End Header -->

  <section id="hero" class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column  justify-content-center text mt-5" data-aos="fade-up">
          <h4>Platform Learning Management System</h4>
          <h2>Sistem Sekolah Online</h2>
          <h3>"Sekolah jadi lebih mudah dengan berbagai fitur yang tersedia dapat memudahkan siswa bersekolah dan
            guru mengajar"</h3>

          <div class="btn-wrap icon-center mt-3">
            <a href="<?= base_url('') ?>" class="btn daftar-btn ">Lihat Profil</a>
            <!-- <a href="" class="btn daftar-btn ">Tentang</a> -->
          </div>


        </div>
        <div class=" col-lg-6 order-1 order-lg-2 hero-img justify-content-center text-center icon-center" data-aos="fade-left">
          <img src="<?= base_url('assets/home/gambar/') ?>Asset 2@72x-8.png" alt="" class="img-new" width="90%">
        </div>
      </div>
    </div>


  </section><!-- End Hero -->



  <main id="main">




    <!-- ======= Siswa Section ======= -->
    <section id="mahasiswa" class="mahasiswa">
      <div class="container">

        <div class="section-title">
          <h2>Siswa</h2>
          <p>Platform Sekolah untuk Siswa</p>
        </div>

        <div class="row">
          <div class="col-lg-5 order-1 order-lg-2 hero-img  text-center">
            <img src="<?= base_url('assets/home/gambar/') ?>mhs.png" alt="" srcset="" width="90%" style="margin-top: -5%;">
          </div>
          <div class="col-lg-7 pt-5 pt-lg-0 order-3 order-lg-2 d-flex flex-column text-justify">
            <p>Sekolah online begitu mudah dengan akses cepat dengan berbagai kemudahan fitur. Dapat bertatap muka dengan
              guru menggunakan video call. Melakukan kegiatan pembelajaran menjadi lebih fleksibel dengan adanya fitur absen,tugas dan ujian online yang menunjangan
              dalam kegiatan pembelajaran online. Fitur Peminjaman alat praktikum yang dapat membantu siswa melakukan praktikum online di
              rumah. Fitur ujian online yang dapat membantu guru untuk menyelenggarakan ujian kepada par siswa.</p>
          </div>

        </div>

      </div>
    </section><!-- End Guru Section -->
    <!-- ======= Guru Section ======= -->
    <section id="dosen" class="mahasiswa">
      <div class="container">

        <div class="section-title">
          <h2>Guru</h2>
          <p>Platform Mengajar untuk Guru</p>
        </div>

        <div class="row tex-justify">
          <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column   text-justify">
            <p>Mengajar online menjadi mudah bersama para guru dengan fitur video call. Sistem tambah tugas yang
              memudahkan guru untuk membuat tugas baru yang akan diberikan kepada para siswa. Monitoring secara langsung terhadapt tugas yang
              dan absen secara langsung. Serta meminjam alat praktikum untuk kebutuhan persekolahan. </p>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img justify-content-center text-center icon-center">
            <img src="<?= base_url('assets/home/gambar/') ?>dosen.png" alt="" srcset="" width="90%" style="margin-top: -5%;">
          </div>
        </div>

      </div>
    </section><!-- End mahasiswa Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="container">
            <div class="copyright">
              <?php
                $tanggal = time () ;
                $tahun= date("Y",$tanggal);
                echo "Copyright - Siselo &copy;" . $tahun;
                ?>
            </div>
            <div class="credits">
            </div>
          </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/home/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/home/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>assets/home/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>assets/home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/home/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url() ?>assets/home/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url() ?>assets/home/assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/home/assets/js/main.js"></script>

</body>

</html>