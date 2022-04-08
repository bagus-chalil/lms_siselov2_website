<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('website');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title ?></div>
              <div class="breadcrumb-item">Edit Tugas</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Forms Edit Tugas</h2>
            <p class="section-lead">Silahkan periksa kembali setiap kolom setelah melakukan perubahan.</p>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-10">
                  <div class="card">
                    <div class="container">
                  <div class="card-header">
                    <h4>Edit Tugas</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                      <form action="<?= base_url('guru/edit_data_tugas/'.$tugas_e['id_tugas']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Kode Mata Pelajaran</label>
                      <input type="hidden" class="form-control" readonly name="id" value="<?= $tugas_e['id_tugas']; ?>">
                      <input type="hidden" class="form-control" readonly name="kelas_id" value="<?= $tugas_e['kelas_id']; ?>">
                      <input type="text" class="form-control" readonly name="k_tugas" value="<?= $tugas_e['m_mapelId']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Nama Tugas</label>
                      <input type="text" class="form-control" name="tugas" value="<?= $tugas_e['nama_tugas']; ?>" id="tugas">
                    </div>
                    <div class="form-group">
                      <label>Deskripsi Tugas</label>
                      <textarea class="form-control" name="deskripsi_tugas"><?= $tugas_e['deskripsi_tugas']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Tugas</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <?php $date = date_create($tugas_e['tgl_tugas']); ?>
                        <input type="text" class="form-control datetimepicker" name="tgl_tugas" min="<?= date_format($date,'Y-m-d\TH:i') ?>" value="<?= date_format($date,'Y-m-d\TH:i') ?>">
                      </div>
                    </div>
                    <a href="<?= base_url('Mapel/file/'.$tugas_e['dokumen_tugas']); ?>"> <i class="fas fa-fw fa-file-pdf"></i> <?= $tugas_e['dokumen_tugas']; ?></a>
                    <div class="form-group">
                        <label>Upload Dokumen</label>
                        <input name="dokumen_tugas" type="file" class="form-control"/>
                        <input name="dokumen_tugas1" type="hidden" value="<?= $tugas_e['dokumen_tugas'];  ?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"
                            id="customCheck1" name="tgs_active" value="1" checked>
                        <label class="custom-control-label" for="customCheck1">Is
                            Active </label>
                    </div>
                    </div> 
                      <button class="btn btn-primary btn-block" id="toastr-2" type="submit">Submit</button>
                    </form>
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