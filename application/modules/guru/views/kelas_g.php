<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Kelas Online</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
          </div>
          <div class="section-body">
          <?= $this->session->flashdata('message'); ?>
            <h2 class="section-title">Hi, <?= $user['f_name'] ?>!</h2>
            <div class="bg-white p-5 shadow">
            <h3 class="mb-5">Daftar Menu Kelas Online</h3>
           
            <div class="col-12 col-sm-6 col-lg-10">
                 <?php $i =1;?>
                   <?php foreach ($guruL as $g) :?>
                 <!-- Card-->
                 <div class="card card-info">
                  <div class="card-header">
                    <h4><a href="<?= base_url('guru/v_kelas_guru/'. $g['kelas_id']); ?>" style="display: inline-block; text-decoration: none;"><b> Kelas <?= $g['nama_kelas']; ?></b></a></h4>
                    <div class="card-header-action align-left">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info"href="#"><i class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="mycard-collapse">
                    <a href="<?= base_url('guru/v_kelas_guru/'. $g['kelas_id']); ?>" style="display: inline-block; text-decoration: none;">
                        <div class="card-body">
                        <h4 ><?= $g['nama_matpel']; ?></h4>
                      </div>
                      </a>
                    <div class="card-footer bg-info text-white">
                      Semester Ganjil 2021
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
            
           </div>
          </div>
        </section>
      </div>