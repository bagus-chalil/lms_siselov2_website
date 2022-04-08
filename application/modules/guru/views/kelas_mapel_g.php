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
            <h2 class="section-title">Hi, <?= $user['name'] ?>!</h2>
            <div class="bg-white p-5 shadow">
            <h3 class="mb-5">Daftar Kelas Online</h3>
           
            <?php $i =1;?>
              <?php foreach ($mapelGuruL as $l) :?>
            <div class="card card-primary">
                  <div class="card-header">
                    <h4>Pertemuan <?= $i++; ?> - <?= $l['id_m_mapel']; ?> </h4>
                    <div class="card-header-action">
                    <div class="btn-group">
                      <a href="<?= base_url('mapel/editmapel/'.$l['id']); ?>" class="btn btn-primary text-white">Edit</a>
                      <a href=""class="btn btn-danger text-white deleteMapel"data-toggle="modal" data-target="#exampleModalCenter1<?=$l['id']; ?>">Delete</a>
                      <a href="<?= base_url('guru/v_mapel/'.$l['id_m_mapel'])?>"class="btn btn-success text-white deleteMapel">Data</a>
                    </div>
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                        <div class="dropdown-menu">
                          <a href=""  data-toggle="modal" data-target="#exampleModalCenters<?= $l['id_m_mapel'] ?>" class="dropdown-item has-icon"><i class="fas fa-eye"></i> Absensi</a>
                          <a href="#" data-toggle="modal" data-target="#exampleModalCenter<?= $l['id_m_mapel'] ?>"class="dropdown-item has-icon"><i class="far fa-edit"></i> Tugas</a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                  <h5><?= $l['judul']; ?></h5>
                  <p><?= $l['keterangan']; ?></p>
                 <table class="table table-bordless">
                     <tbody>
                       <tr>
                         <td>
                         <a href="<?= base_url('mapel/file/'.$l['dokumen']); ?>"> <i class="fas fa-fw fa-file-pdf"></i> <?= $l['dokumen']; ?></a><br>
                         </td>
                       </tr>
                        <?php
                        $mapelId = $l['id_m_mapel'];
                        $querySubMenu = " SELECT *
                                            FROM `tugas`
                                            WHERE `tugas`.`m_mapelId` = '$mapelId'";
                        $subMapel = $this->db->query($querySubMenu)->result_array();
                        ?>
                        <?php foreach ($subMapel as $sm) :?>
                        <tr>
                            <?php if ($l['id_m_mapel'] == $sm['m_mapelId']) { ?>
                                <td>
                                    <a href="" class="mt-5"> <i class="fas fa-fw fa-file-upload"></i> Tugas- <?= $sm['nama_tugas'] ; ?></a>   
                                </td>
                                <td class="float-right">
                                <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url("guru/edit_tugas/". $sm['id_tugas']); ?>"> <i class="fa fa-pencil-alt"></i> </a>
                                <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url("guru/hapus_tugas/".$sm['id_tugas']); ?>"> <i class="fa fa-trash"></i> </a>
                                </td>
                            <?php }else { ?>                                    
                            <?php } ?>
                        </tr>          
                        <?php endforeach; ?>
                        <?php
                        $mapelIds = $l['id_m_mapel'];
                        $querySubMapels = " SELECT *
                                            FROM `absensi`
                                            WHERE `absensi`.`m_mapel_id` = '$mapelIds'";
                        $subMapels= $this->db->query($querySubMapels)->result_array();
                        ?>
                        <?php foreach ($subMapels as $ms) :?>
                        <tr>
                            <?php if ($l['id_m_mapel'] == $ms['m_mapel_id']) { ?>
                                <td>
                                    <a href="" class="mt-5"> <i class="fas fa-fw fa-cloud"></i> Absensi - <?= format_indo($ms['tgl_absen']); ?></a>   
                                </td>
                                <td class="float-right">
                                <a class="btn waves-effect waves-light btn-success text-white" data-toggle="modal" data-target="#exampleModalCenters1<?= $ms['id_absen'] ?>" > <i class="fa fa-pencil-alt"></i> </a>
                                <a class="btn waves-effect waves-light btn-danger text-white" id="toastrs-2" href="<?= base_url("guru/hapus_absensi/".$ms['id_absen']); ?>"> <i class="fa fa-trash"></i> </a>
                                </td>
                            <?php }else { ?>                                    
                            <?php } ?>
                        </tr>          
                        <?php endforeach; ?>
                     </tbody>
                 </table>
                  </div>
                </div>
            <?php endforeach; ?>
           </div>
          
          </div>
        </section>
      </div>
      <!-- Modal Tugas Tambah-->
      <?php $i =1;?>
              <?php foreach ($mapelGuruL as $l) :?>
      <div class="modal fade" id="exampleModalCenter<?= $l['id_m_mapel'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Tugas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('guru/add_tugas/') ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Kode Tugas:</label>
                <input type="hidden" class="form-control" id="id" value="<?= $id_kelas; ?>" name="id">
                <input type="text" class="form-control" id="k_tugas" readonly value="<?= $l['id_m_mapel']; ?>" name="k_tugas">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nama Tugas:</label>
                <input type="text" class="form-control" id="n_tugas" name="n_tugas" required>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Deskripsi Tugas:</label>
                <textarea class="form-control" name="d_tugas" required></textarea>
              </div>
              <div class="form-group">
                      <label>Tanggal Tugas</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <?php 
                        $l=date("Y-m-d H:i:s",time());
                        $date = date_create($l);
                        ?>
                        <input type="datetime-local" class="form-control" name="tgl_tugas" min="<?= date_format($date,'Y-m-d\TH:i') ?>" value="<?= date_format($date,'Y-m-d\TH:i') ?>">
                      </div>
                    </div>
              <div class="mb-3">
                <label>Upload Dokumen</label>
                <input name="dokumen_tugas" type="file" class="form-control"/>
                <span class="text-danger">*Opsional</span>
              </div>
              <div class="mb-3">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" required id="tgs_active" name="tgs_active" value="1" checked>
                  <label class="custom-control-label" for="customCheck1">Is
                      Active </label>
              </div>
              </div>
            </div>
            <hr>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

      <!-- Modal Absensi Tambah-->
      <?php $i =1;?>
              <?php foreach ($mapelGuruL as $l) :?>
      <div class="modal fade" id="exampleModalCenters<?= $l['id_m_mapel'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Absensi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('guru/add_absensi/') ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Kode Absensi:</label>
                <input type="hidden" class="form-control" id="id" value="<?= $id_kelas; ?>" name="id">
                <input type="text" readonly class="form-control" id="k_absensi" value="<?= $l['id_m_mapel']; ?>" name="k_absensi">
              </div>
              <div class="form-group">
                      <label>Tanggal absensi</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <?php 
                        $l=date("Y-m-d H:i:s",time());
                        $date = date_create($l);
                        ?>
                        <input type="datetime-local" class="form-control" name="tgl_absen" min="<?= date_format($date,'Y-m-d\TH:i') ?>" value="<?= date_format($date,'Y-m-d\TH:i') ?>">
                      </div>
                    </div>
              <div class="mb-3">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" required id="absen_active" name="absen_active" value="1" checked>
                  <label class="custom-control-label" for="customCheck1">Is
                      Active </label>
              </div>
              </div>
            </div>
            <hr>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      
      <!-- Modal Absensi Edit-->
      <?php $i =1;?>
              <?php foreach ($absensiGuruL as $sl) :?>
      <div class="modal fade" id="exampleModalCenters1<?= $sl['id_absen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Tugas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('guru/edit_absensi/'.$sl['id_absen']) ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Kode Tugas:</label>
                <input type="hidden" class="form-control" id="id" value="<?= $id_kelas; ?>" name="id">
                <input type="text" readonly class="form-control" id="k_absensi" value="<?= $sl['m_mapel_id']; ?>" name="k_absensi">
              </div>
              <div class="form-group">
                      <label>Date Range Picker</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <?php $date = date_create($sl['tgl_absen']); ?>
                        
                        <input type="datetime-local" class="form-control" name="tgl_absen" min="<?= date_format($date,'Y-m-d\TH:i') ?>" value="<?= date_format($date,'Y-m-d\TH:i') ?>">
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"
                            id="customCheck1" name="absensi_active" value="1" checked>
                        <label class="custom-control-label" for="customCheck1">Is
                            Active </label>
                    </div>
                    </div> 
            </div>
            <hr>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
     
      <!-- Modal alert hapus -->
      <?php foreach ($mapelGuruL as $l) :?>
      <div class="modal fade" id="exampleModalCenter1<?=$l['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <h1 class="text-center text-danger"><i class="fa fa-exclamation-circle fa-3x"></i></i></i></h1><br>
              Yakin ingin menghapus data matapelajaran <?= $l['id_m_mapel']; ?> ?
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</a>
              <a type="button" class="btn btn-danger text-white" href="<?= base_url('mapel/hapus_mapel/'.$l['id']); ?>">Delete</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

