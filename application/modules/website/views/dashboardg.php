<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah kelas</h4>
                  </div>
                  <div class="card-body">
                    <?= $kelas['kelas'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-th-list"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Matapelajaran</h4>
                  </div>
                  <div class="card-body">
                    <?= $matapelajaran['nama_matpel'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Soal</h4>
                  </div>
                  <div class="card-body">
                    <?= $soal['soal'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4><?=strftime('%A, %d %B %Y')?></h4>
                  </div>
                  <div class="card-body">
                    <h4 class="float-left" id="clock"></h4>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
            <?php if(empty($user['matpel_id']) or empty($user['alamatg']) or empty($user['telephoneg'])){ ?>  
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card-body p-0">
                <div class="col-12 mb-4">
                  <div class="hero bg-primary text-white">
                      <div class="empty-state">
                        <div class="empty-state-icon">
                        <i class="fas fa-exclamation"></i>
                        </div>
                        <h2>Terdapat data yang kosong.</h2>
                      </div>
                    <div class="hero-inner">
                      <h2>Welcome, <?= $user['name'] ?>!</h2>
                      <p class="lead"> Silahkan lengkapi data profile yang kosong pada menu profile.</p>
                      <div class="mt-4">
                      <a href="<?= base_url('profil/') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <?php }else if($kelas['kelas'] == 0)  { ?>
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card-body p-0">
                <div class="col-12 mb-4">
                  <div class="hero bg-primary text-white">
                      <div class="empty-state">
                        <div class="empty-state-icon">
                        <i class="fas fa-exclamation"></i>
                        </div>
                        <h2>Terdapat data yang kosong.</h2>
                      </div>
                    <div class="hero-inner">
                      <h2>Welcome, <?= $user['name'] ?>!</h2>
                      <p class="lead"> Silahkan lengkapi data kelas yang kosong pada menu profile.</p>
                      <div class="mt-4">
                        <a href="<?= base_url('profil/') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <?php }else{ ?>
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card-body p-0">
                <div class="col-12 mb-4">
                  <div class="hero bg-primary text-white">
                      <div class="empty-state">
                        <div class="empty-state-icon">
                        <i class="fas fa-exclamation"></i>
                        </div>
                        <h2>Tidak ada notifikasi</h2>
                      </div>
                    <div class="hero-inner">
                      <h2>Welcome, <?= $user['name'] ?>!</h2>
                      <p class="lead"> Semua data telah berhasil disimpan.</p>
                      <div class="mt-4">
                      <?php $id=$this->session->userdata('id');?>
                        <a href="<?= base_url('login/logout/'.$id) ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-power-off"></i> Setup Account</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <?php } ?>
          </div>
          </div>
          </div>
        </section>