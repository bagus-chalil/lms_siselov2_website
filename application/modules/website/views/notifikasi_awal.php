<?php if ($user['verifikasi_user'] == 1) { ?>
      <!-- Main Content Guest Login-->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="col-lg-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-lg-6">
              <h1 class="float-right" id="clock"></h1>
            </div>
          </div>
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card-body p-0">
                <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="empty-state">
                      <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                      </div>
                      <h2>We couldn't find any data</h2>
                    </div>
                  <div class="hero-inner">
                    <h2>Welcome, <?= $user['name'] ?>!</h2>
                    <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
                    <div class="mt-4">
                      <a href="<?= base_url('profil/profile_guest') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                    </div>
                  </div>      
                </div>
              </div>
              </div>
            </div>
        </section>
      </div>
<?php }else if ($user['verifikasi_user'] == 2) { ?>
      <!-- Main Content Guest-->
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="col-lg-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-lg-6">
              <h1 class="float-right" id="clock"></h1>
            </div>
          </div>
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card-body p-0">
                <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="empty-state">
                      <div class="empty-state-icon">
                      <i class="fas fa-exclamation"></i>
                      </div>
                      <h2>Terima Kasih telah berkunjung !</h2>
                    </div>
                  <div class="hero-inner">
                    <h2>Welcome, <?= $user['name'] ?>!</h2>
                    <p class="lead"> Sekolah online begitu mudah dengan akses cepat dengan berbagai kemudahan fitur. 
                      Melakukan kegiatan pembelajaran menjadi lebih fleksibel dengan adanya fitur absen,tugas dan ujian online yang menunjangan dalam kegiatan pembelajaran online. 
                      yang dapat membantu siswa melakukan praktikum online di rumah. Fitur ujian online yang dapat membantu guru untuk menyelenggarakan ujian kepada par siswa..</p>
                    <div class="mt-4">
                      <a href="<?= base_url('profil/profile_guest') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php }else if ($user['verifikasi_user'] == 3) { ?>
  <!-- Main Content -->
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="col-lg-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-lg-6">
              <h1 class="float-right" id="clock"></h1>
            </div>
          </div>
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card-body p-0">
                <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="empty-state">
                      <div class="empty-state-icon">
                      <i class="fas fa-exclamation"></i>
                      </div>
                      <h2>Selamat data berhasil disimpan</h2>
                    </div>
                  <div class="hero-inner">
                    <h2>Welcome, <?= $user['name'] ?>!</h2>
                    <p class="lead"> Silahkan logout akun untuk dapat masuk ke dalam sistem LMS SISELO.</p>
                    <div class="mt-4">
                      <a href="<?= base_url('login/logout1') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-power-off"></i> Setup Account</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </section>
      </div>
<?php } ?>