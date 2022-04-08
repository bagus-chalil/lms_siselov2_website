      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('kelas'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url('kelas'); ?>">Halaman Belajar</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('kelas/v_kelas_online/').$user['nisn']; ?>">Kelas Online</a></div>
                <div class="breadcrumb-item">Upload Tugas</div>
            </div>
          </div>

          <?= $this->session->flashdata('message'); ?>
          <div class="section-body">
            <h2 class="section-title">Halaman Tugas Siswa</h2>
            <p class="section-lead">Silahkan perhatikan detail tugas yang telah di berikan dan kumpulkan sesuai dengan instruksi dari <br> guru yang bersangkutan !</p>
            <div class="row">
                <!-- Belum Ada tugas -->
                <div class="col-12 col-md-6 col-lg-8">
                      <div class="card">
                        <div class="container">
                      <div class="card-header">
                        <h4>Form Input Tugas</h4>
                      </div>
                      <div class="card-body">
                          <form action="<?= base_url('kelas/addTugas') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>Kode Mata Pelajaran</label>
                          <input type="text" class="form-control" readonly name="kode" value="<?= $v_tugas['id_m_mapel']?>" >
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" readonly name="id_tugas" value="<?= $v_tugas['id_tugas']?>">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" readonly name="nisn" value="<?= $user['nisn'];  ?>">
                        </div>
                        <div class="form-group">
                          <label>Deskripsi Tugas </label>
                          <textarea class="form-control" name="deskripsi"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Upload Dokumen Tugas</label>
                            <input name="dokumen" type="file" class="form-control"/>
                          </div>
                          <?php if( $terlambat > $now ) : ?>
                          <button class="btn btn-primary btn-block" type="submit">Submit</button>
                          <?php else : ?>
                          <?php endif ; ?>
                        </form>
                      </div>
                    </div>
                    </div>
                </div>

            <div class="col-12 col-md-6 col-lg-4">
            <div class="card card-primary">
                  <div class="card-header">
                    <h4><?= $v_tugas['nama_tugas']?></h4>
                    <div class="card-header-action align-left">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon btn-primary"href="#"><i class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  
                  <div class="collapse show" id="mycard-collapse">
                        <div class="card-body">
                        <h6>Detail Tugas :</h6>
                        <p class="ml-2">
                            <b>Matapelajaran :</b> <?= $v_tugas['nama_matpel']?><br>
                            <b>Kelas :</b> <?= $v_tugas['nama_kelas']?><br>
                            <b>Deskripsi Tugas :</b> <?= $v_tugas['deskripsi_tugas']?><br>
                            <b>Dokumen tugas* :</b><br> 
                            <a href="<?= base_url('kelas/file/'.$v_tugas['dokumen_tugas']); ?>"><i class="fas fa-fw fa-file-pdf"></i><?= $v_tugas['dokumen_tugas']; ?></a><br>
                        </p>
                        <h6>* Hanya Bersifat Opsional !</h6>
                      </div>
                    <div class="card-footer bg-primary text-white">
                      Semester Ganjil 2021
                    </div>
                  </div>
                </div>
            </div>
        </div>
        </div>
        </section>
      </div>
      