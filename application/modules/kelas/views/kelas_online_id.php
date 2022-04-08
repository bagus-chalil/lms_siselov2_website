      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('kelas'); ?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= base_url('kelas'); ?>">Halaman Belajar</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('kelas/v_kelas_online/').$user['nisn']; ?>">Kelas Online</a></div>
                <div class="breadcrumb-item"><?= $mapels['nama_matpel'] ?></div>
            </div>
          </div>

          <div class="section-body">
          <?= $this->session->flashdata('message'); ?>
          <?php $i =1;?>
              <?php 
              foreach ($mapelGuruL as $l) :?>
              
            <div class="card card-primary">
                  <div class="card-header">
                    <h4 style="font-size:20px;font-weight: 1000;">Pertemuan ke- <?= $i++?></h4>
                    <div class="card-header-action float-right">
                      <div class="btn-group">
                      <h6 class="text-primary"><?= $l['id_m_mapel']; ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                  <h5><?= $l['judul']; ?></h5>
                    <table class="table table-bordless">
                      <tbody>
                        <tr>
                          <td>
                          <a href="<?= base_url('kelas/file/'.$l['dokumen']); ?>"> <i class="fas fa-fw fa-file-pdf"></i> <?= $l['dokumen']; ?></a><br>
                          <!-- <object data="<?= base_url('assets/Dokumen/'.$l['dokumen']); ?>" type="application/pdf" width="100%" height="500px"></object>
                            <a src="<?= base_url('kelas/file/'.$l['dokumen']); ?>"> <i class="fas fa-fw fa-file-pdf"></i> <?= $l['dokumen']; ?></a><br> -->
                          </td>
                        </tr>
                        <!-- Tugas -->
                        <?php
                        $mapelId = $l['id_m_mapel'];
                        $querySubMapel = " SELECT *
                                            FROM `tugas`
                                            WHERE `tugas`.`m_mapelId` = '$mapelId'
                                            and `tgs_active`=1";
                        $subMapel = $this->db->query($querySubMapel)->result_array();
                        ?>
                        <?php foreach ($subMapel as $sm) :?>
                        <?php
                        $tugas = $sm['id_tugas'];
                        $querySubTugas = " SELECT *
                                            FROM `tugas_siswa`
                                            WHERE `tugas_id` = $tugas
                                            and `status_tugas`=1";
                        $subTugas = $this->db->query($querySubTugas)->result_array();
                        ?>
                        <tr>
                          <?php if ($l['id_m_mapel'] == $sm['m_mapelId']) { ?>
                            <td>
                              <a href="<?= base_url('kelas/v_tugas/'.$sm['id_tugas']) ?>" class="mt-5"> <i class="fas fa-fw fa-file-upload"></i> Tugas- <?= $sm['nama_tugas'] ; ?></a>   
                            </td>
                            <?php foreach ($subTugas as $t) :?>
                              <?php if ($sm['id_tugas']==$t['tugas_id'] and $user['nisn']==$t['nisn']) { ?>
                              <td class="float-right">
                                <h5 class="text-primary "><i class="fas fa-fw fa-check-square fa-7x"></i></h5>
                              </td>
                              <?php }else{?>
                              <?php } ?>
                            <?php endforeach; ?>
                          <?php }else { ?>                                    
                          <?php } ?>
                        </tr>          
                        <?php endforeach; ?>
                        <!-- Absensi -->
                        <?php
                        $mapelIds = $l['id_m_mapel'];
                        $userId=$user['nisn'];
                        $querySubMapels = "SELECT *,(SELECT COUNT(id) FROM `absensi_siswa`
                                            WHERE `absensi_siswa`.`nisn` = $userId AND `absensi`.`id_absen` = `absensi_siswa`.`absen_id`) AS ada
                                            FROM `absensi`
                                            WHERE `m_mapel_id` = '$mapelIds'
                                            and `absensi_active`=1";
                        $subMapels= $this->db->query($querySubMapels)->result_array();
                        ?>
                        <?php foreach ($subMapels as $ms) :?>
                        <tr>
                        <?php if ($l['id_m_mapel'] == $ms['m_mapel_id'] and $ms['ada'] > 0) { ?>
                            <td>
                                <a href="" class="mt-5"> <i class="fas fa-fw fa-cloud"></i> Absensi - <?= format_indo($ms['tgl_absen']); ?></a>   
                            </td>
                            <td class="float-right">
                              <h5 class="text-primary "><i class="fas fa-fw fa-check-square fa-7x"></i></h5>
                            </td>
                          <?php }else { ?>
                            <td>
                                <a href="" readonly style="text-decoration: none;" class="mt-5"> <i class="fas fa-fw fa-cloud"></i> Absensi - <?= format_indo($ms['tgl_absen']); ?></a>   
                            </td>        
                            <td class="float-right">
                              <form action="<?= base_url('kelas/absen_siswa/') ?>" method="POST">
                                <input type="hidden" class="form-control" id="k_tugas" name="nisn" value="<?= $user['nisn']; ?>">
                                <input type="hidden" class="form-control" id="n_tugas" name="id_absen" value="<?= $ms['id_absen']; ?>">
                                <input type="hidden" class="form-control" id="n_tugas" name="status" value="1">
                                <input type="hidden" class="form-control" id="n_tugas" name="kelas_id" value="<?= $l['id_matpel']?>">
                                <button type="submit" class="btn btn-primary"> <i class="fas fa-check-square"></i> Absen</button>
                              </form>
                            </td>
                          <?php } ?>
                        </tr>          
                        <?php endforeach; ?> 
                      </tbody>
                  </table>
                  </div>
                </div>
                <?php endforeach; ?>
          </div>
        </section>
      </div>