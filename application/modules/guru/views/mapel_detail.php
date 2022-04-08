      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Kelas'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url('Kelas'); ?>">Halaman Belajar</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('Kelas/v_kelas_online/').$user['nisn']; ?>">Kelas Online</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Siswa</h4>
                  </div>
                  <div class="card-body">
                    <?= $siswa['siswa']?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tugas Dikumpulkan</h4>
                  </div>
                  <div class="card-body">
                  <?= $tugas1['tugasi']?>
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
                    <h4>Absensi</h4>
                  </div>
                  <div class="card-body">
                  <?= $absensi['absen']?>
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

          <?= $this->session->flashdata('message'); ?>
          <?php $i=1 ;?>
          <?php foreach ($absen as $a) :?>
            <div class="card card-primary">
                  <div class="card-header">
                    <h4 style="font-size:20px;font-weight: 1000;">Data Absensi Siswa</h4>
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
                          <h4>Detail Absen - <?= $i++ ?> </h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-6">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <td class="text-center"><h6>Mata Pelajaran :</h6></td>
                                    <td><h6><?= $id_Matpel?></h6></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center"><h6>Tanggal absen :</h6></td>
                                    <td><h6><?= format_indo($a['tgl_absen']);?></h6></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-lg-6">
                            <table class="table">
                                <tbody>
                                  <tr>
                                  <td class="text-center"><h6>Mata Pelajaran :</h6></td>
                                  <td><h6><?= $a['nama_matpel']?></h6></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center"><h6>Waktu absen :</h6></td>
                                    <td><h6><?= waktu_indo($a['tgl_absen']);?> WIB</h6></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                              <thead class="text-center">                                 
                                <tr>
                                  <th class="text-center">
                                    #
                                  </th>
                                  <th>Nama</th>
                                  <th>Kelas</th>
                                  <th>NISN</th>
                                  <th>Tanggal Absensi</th>
                                  <th>Waktu Absensi</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody class="text-center">
                              <?php $i =1;?>
                              <?php foreach ($v_mapel as $v) :?>
                                <tr>
                                  <td>
                                    <?= $i++;?>
                                  </td>
                                  <td><?= $v['name'] ?></td>
                                  <td><?= $v['nama_kelas'] ?></td>
                                  <td><?= $v['nisn'] ?></td>
                                  <td><?= format_indo(date('Y-m-d' ,$v['tgl_absen_siswa']));?></td>
                                  <td><?= date('H:i:s' ,$v['tgl_absen_siswa']); ?> WIB</td>
                                <?php 
                                $batas=strtotime($a['tgl_absen']);
                                $waktu=$v['tgl_absen_siswa'];
                                ?>
                                <?php if ($waktu > $batas)  { ?>
                                  <td><a class="btn btn-danger text-white">Terlmbat</a></td>
                                <?php }else{?>
                                    <td><a class="btn btn-success text-white">Tepat Waktu</a></td>
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
              <?php endforeach; ?>
              <!-- Data Tugas -->
              <?php foreach ($tugas as $t) :?>
              <div class="card card-primary">
                  <div class="card-header">
                    <h4 style="font-size:20px;font-weight: 1000;">Data Tugas Siswa</h4>
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
                          <h4>Detail Tugas <?= $t['nama_tugas']?></h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-6">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <td class="text-center"><h6>Mata Pelajaran :</h6></td>
                                    <td><h6><?= $id_Matpel?></h6></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center"><h6>Batas Tanggal :</h6></td>
                                    <td><h6><?=strftime('%d %B %Y', strtotime($t['tgl_tugas']))?></h6></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-lg-6">
                            <table class="table">
                                <tbody>
                                  <tr>
                                  <td class="text-center"><h6>Mata Pelajaran :</h6></td>
                                  <td><h6><?= $t['nama_matpel']?></h6></td>
                                  </tr>
                                  <tr>
                                    <td class="text-center"><h6>Batas Waktu :</h6></td>
                                    <td><h6><?=DATE('H:i:s', strtotime($t['tgl_tugas']))?> WIB</h6></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                              <thead class="text-center">                                 
                                <tr>
                                  <th class="text-center">
                                    #
                                  </th>
                                  <th>Nama</th>
                                  <th>Kelas</th>
                                  <th>NISN</th>
                                  <th>Nama Tugas</th>
                                  <th>Tanggal Tugas</th>
                                  <th>Waktu Mengumpulkan</th>
                                  <th>Dokumen</th>
                                  <th>Status</th>
                                  <th>Nilai</th>
                                </tr>
                              </thead>
                              <tbody class="text-center">
                              <?php $i =1;?>
                              <?php
                              $kode= $t['m_mapelId']; 
                              $query = "SELECT `tugas_siswa`.*,`tugas`.*,`user`.`name`,`user`.`role_id`,`m_mapel`.`id_m_mapel`,`kelas`.*,`matpel`.*
                                        FROM `user`
                                        LEFT JOIN `siswa` 
		                                    on `user`.`id`=`siswa`.`user_id`
                                        LEFT JOIN `tugas_siswa` 
                                        ON `tugas_siswa`.`nisn`=`siswa`.`nisn`
                                        LEFT JOIN `tugas` 
                                        ON `tugas`.`id_tugas`=`tugas_siswa`.`tugas_id`
                                        LEFT JOIN `m_mapel` 
                                        ON `m_mapel`.`id_m_mapel`=`tugas`.`m_mapelId`
                                        LEFT JOIN `matpel` 
                                        ON `matpel`.`id_matpel`=`m_mapel`.`mapel_id`
                                        LEFT JOIN `kelas`
                                        ON `kelas`.`id_kelas`=`m_mapel`.`kelas_id`
                                        WHERE `user`.`role_id`=3 AND `m_mapel`.`id_m_mapel`='$kode'
                                        order by `tugas`.`m_mapelId` DESC";
                              $tugas_v = $this->db->query($query)->result_array(); ?>
                              <?php foreach ($tugas_v as $l) :?>
                                <?php if ($l['tugas_id'] == $t['id_tugas']) { ?>
                                <?php 
                                $batas=strtotime($t['tgl_tugas']);
                                $waktu=$l['waktu_pengumpulan'];
                                ?>
                                <tr>
                                  <td><?= $i++;?></td>
                                  <td><?= $l['name'] ?></td>
                                  <td><?= $l['nama_kelas'] ?></td>
                                  <td><?= $l['nisn'] ?></td>
                                  <td><?= $l['nama_tugas'] ?></td>
                                  <td><?= format_indo(date('Y-m-d' ,$l['waktu_pengumpulan'])); ?></td>
                                  <td><?= date('H:i:s' ,$l['waktu_pengumpulan']); ?> WIB</td>
                                  <td><a href="<?= base_url('Guru/file/'.$l['dokumen_hasil']); ?>"> <i class="fas fa-fw fa-file-pdf"></i> <?= $l['dokumen_hasil']; ?></a></td>
                                  <!-- Absen -->
                                  <?php if ($waktu > $batas)  { ?>
                                      <td><a class="btn btn-danger text-white">Terlambat</a></td>
                                  <?php }else{?>
                                      <td><a class="btn btn-success text-white">Tepat Waktu</a></td>
                                  <?php }?>
                                  <!-- Nilai -->
                                  <?php if ($l['nilai'] > 0)  { ?>
                                      <td><?= $l['nilai'] ?></td>
                                  <?php }else{?>
                                      <td><a class="btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalCenters<?= $l['id'] ?>">Input</a></td>
                                  <?php }?>
                                  </tr>
                                    <?php }else if ($l['id_m_mapel'] != $id_Matpel){?>
                                  <?php } ?>
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
              <?php endforeach; ?>
              
          </div>
        </section>
      </div>
      