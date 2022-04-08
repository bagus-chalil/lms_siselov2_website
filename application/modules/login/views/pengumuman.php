<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LMS -SISELO</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">

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
          <li><a href="<?= base_url('login/awal') ?>">Beranda</a></li>
          <li><a href="<?= base_url('login/awal') ?>">Siswa</a></li>
          <li><a href="<?= base_url('login/awal') ?>">Guru</a></li>
          <li class="active"><a href="<?= base_url('login/pengumuman') ?>">Pengumuman</a></li>


        </ul>

      </nav><!-- .nav-menu -->

      <!-- <a href="index.html" class="get-started-btn">Get Started</a> -->
      <a href="<?= base_url('login') ?>" class="login-btn ml-auto">Login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Siswa Section ======= -->
  <section id="mahasiswa" class="mahasiswa mt-5">
      <div class="container">

        <div class="section-title">
          <h2>Halaman</h2>
          <p>Pengumuman Sekolah</p>
        </div>

        <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <?php foreach ($pengumuman as $pm) : ?>
                <div class="card">
                  <div class="card-header bg-primary text-white">
                    <h4><?= $pm['judul'] ?></h4>
                    <p><b></b><br></p>
                  </div>
                  <div class="card-body">
                    <div class="media">
                      <img class="mr-3 rounded-circle" src="<?= base_url('assets/images/faces/'). $pm['image']; ?>" width="5%" alt="Generic placeholder image">
                      <div class="media-body">
                        <h5 class="mt-0"><?= $pm['name'] ?> - <?= format_indo($pm['tgl_pengumuman']);?></h5>
                        <h6 class="mt-0">Updated <?= waktu_indo($pm['tgl_pengumuman']);?> WIB</h6>
                        <hr>
                        <p class="mb-0"><?= $pm['deskripsi'] ?></p>
                        <p><a href="<?= base_url('pengumuman/file/'.$pm['dokumen']); ?>"> <i class="fas fa-fw fa-file-pdf"></i> <?= $pm['dokumen']; ?></a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>

      </div>
    </section><!-- End Guru Section -->

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

  

  <!-- General JS Scripts -->
  <script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/modules/popper.js"></script>
  <script src="<?= base_url() ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>assets/js/custom.js"></script>

</body>

</html>