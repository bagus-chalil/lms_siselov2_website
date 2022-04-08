      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('kelas'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url('kelas'); ?>">Halaman Belajar</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('kelas/v_kelas_online/').$user['nisn']; ?>">Kelas Online</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="section-body">

          <?= $this->session->flashdata('message'); ?>
            <div class="card card-primary">
                  <div class="card-header">
                    <h4 style="font-size:20px;font-weight: 1000;">Data Pinjam Siswa</h4>
                    <div class="card-header-action float-right">
                      <div class="btn-group">
                      <h6 class="text-primary"></h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Detail Siswa</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-6">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <td class="text-center"><h6>Nama Siswa :</h6></td>
                                    <td><h6><?= $user['name']?></h6></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center"><h6>NISN :</h6></td>
                                    <td><h6><?= $user['nisn']?></h6></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-lg-6">
                            <table class="table">
                                <tbody>
                                  <tr>
                                  <td class="text-center"><h6>Alamat :</h6></td>
                                  <td><h6><?= $user['alamat']?></h6></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center"><h6>Nomor Telephone :</h6></td>
                                    <td><h6> <?= $user['telephone']?></h6></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                            <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>nama_alat</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th class="text-center">Gambar</th>
                                        <th>Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    <?php foreach ($alat_praktikum as $a) : ?>
                                          <?php
                                          $userId = $user['nisn'];
                                          $querysubAlat = "SELECT *
                                                              FROM `tb_pinjam_alat`
                                                              where `nisn`=$userId";
                                          $alat = $this->db->query($querysubAlat)->result_array();
                                          // var_dump($alat);die;
                                          ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $a['nama_alat']; ?></td>
                                            <td><?= $a['nama_matpel']; ?></td>
                                            <td><?= $a['nama_kelas']; ?></td>
                                            <td class="text-center"><img src="<?= base_url('assets/images/alat/' . $a['gambar']); ?>" class="img-thumbnail" width="30%"></td>
                                            <td><?= $a['stok']; ?></td>
                                            <?php if ($a['ada']>0) {?>
                                              <td>
                                                <a class="btn waves-effect waves-light btn-primary text-white"> <i class="fas fa-print"></i> Cetak Bukti Pinjam</a>
                                              </td>
                                            <?php }else{?>
                                              <td class="text-center">
                                                <a class="btn waves-effect waves-light btn-danger text-white" data-toggle="modal" data-target="#exampleModal<?= $a['id'];?>"> <i class="far fa-handshake"></i> Pinjam Online</a>
                                              </td>
                                            <?php }?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
              
          </div>
        </section>
      </div>
      <!-- Bakcup -->
      <!-- <?php
                                          $userId = $user['nisn'];
                                          $querysubAlat = "SELECT *
                                                              FROM `tb_pinjam_alat`";
                                          $alat = $this->db->query($querysubAlat)->result_array();
                                          ?>
                                    <?php foreach ($alat_praktikum as $a) : ?>
                                      
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $a['nama_alat']; ?></td>
                                            <td><?= $a['nama_matpel']; ?></td>
                                            <td><?= $a['nama_kelas']; ?></td>
                                            <td class="text-center"><img src="<?= base_url('assets/images/alat/' . $a['gambar']); ?>" class="img-thumbnail" width="30%"></td>
                                            <td><?= $a['stok']; ?></td>
                                            <?php foreach ($alat as $s) : ?>
                                            <?php if ($s['nisn']==$user['nisn']) {?>
                                              <td>
                                                <a class="btn waves-effect waves-light btn-primary text-white"> <i class="fas fa-print"></i> Cetak Bukti Pinjam</a>
                                              </td>
                                            <?php }else{?>
                                              <td class="text-center">
                                                <a class="btn waves-effect waves-light btn-danger text-white" data-toggle="modal" data-target="#exampleModal<?= $a['id'];?>"> <i class="far fa-handshake"></i> Pinjam Online</a>
                                              <?php var_dump($a['id']);?>
                                              </td>
                                            <?php }?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?> -->

      <!-- Modal Pinjam Alat-->
      <?php $i =1;?>
      <?php foreach ($alat_praktikum as $l) :?>
      <div class="modal fade" id="exampleModal<?= $l['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('Praktikum/pinjem_alat/') ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="menuname">Nama Alat Praktikum</label>
                  <input class="form-control" type="hidden" id="id" value="<?= $l['id'] ?>" name="id" required>
                  <input class="form-control" type="text" readonly id="nama_alat" value="<?= $l['nama_alat'] ?>" name="nama_alat" required>
              </div>
              <div class="form-group">
                  <label for="menuname">NISN</label>
                  <input class="form-control" type="text" readonly value="<?= $user['nisn'] ?>" id="nisn" name="nisn" required>
              </div>
              <div class="form-group">
                <label>Tanggal Pinjam</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-calendar"></i>
                    </div>
                  </div>
                  <input type="datetime-local" class="form-control" name="tgl_pinjam" min="<?= date('d-m-Y\TH:1') ?>">
                </div>
              </div>
              <div class="form-group">
                <label>Tanggal Kembali</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-calendar"></i>
                    </div>
                  </div>
                  <input type="datetime-local" class="form-control" name="tgl_kembali" min="<?= date('d-m-Y\TH:1') ?>">
                </div>
              </div>
              <span> Keterangn | AM : PAGI-SIANG | PM :SORE-MALAM </span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="toastrs1-2" >Save changes</button>
          </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      