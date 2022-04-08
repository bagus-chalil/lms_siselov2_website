      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('kelas'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url('kelas'); ?>">Halaman Belajar</a></div>
              <div class="breadcrumb-item"><?= $title?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Kelas Online</h2>
            <p class="section-lead">Silahkan pilih matapelajaran pada menu kelas online. !</p>
            <?php $i =1;?>
              <?php foreach ($mapelL as $l) :?>
            <div class="card">
              <div class="card-header">
                <h4><?= $l['nama_matpel']; ?></h4>
              </div>
              <a href="<?= base_url('kelas/v_kelas_id/'. $l['id_matpel']); ?>" style="display: inline-block; text-decoration: none;">
                <div class="card-body" style="color: black;">
                  <p>Pada Matapelajaran ini terdapat beberapa kompetensi yang harus siswa penuhi seperti :
                     <ul>
                       <li>materi yang dipelajari</li>
                       <li>tugas yang dikumpulkan</li>
                       <li>Absensi Kelas</li>
                     </ul>
                  </p>
                  <div class="ml-0">
                    <a class="btn btn-primary" href="<?= base_url('kelas/v_kelas_id/'. $l['id_matpel']); ?>" role="button">Lihat Selengkapnya</a>
                  </div>
                  </div>
                </a>
              <div class="card-footer bg-whitesmoke">
                Semester Genap 2021-2022
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>
      