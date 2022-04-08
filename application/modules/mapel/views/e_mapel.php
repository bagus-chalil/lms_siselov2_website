<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigasi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('website');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Form Edit Matapelajaran</h2>
            <p class="section-lead">Silahkan cek kembali materi pelajaran yang telah di edit !.</p>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-10">
                  <div class="card">
                    <div class="container">
                  <div class="card-header">
                    <h4>Input Text</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                      <form action="<?= base_url('mapel/edit_data_mapel/'.$editGuruL['id']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Kode Mata Pelajaran</label>
                      <input type="hidden" class="form-control" readonly name="id" value="<?= $editGuruL['id']; ?>">
                      <input type="hidden" class="form-control" readonly name="kelas" value="<?= $editGuruL['kelas_id']; ?>">
                      <input type="text" class="form-control" readonly name="kode" value="<?= $editGuruL['id_m_mapel']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Judul Materi</label>
                      <input type="text" class="form-control" name="judul" value="<?= $editGuruL['judul']; ?>" id="judul">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" readonly value="<?= $editGuruL['id_matpel']; ?>"name="mapel">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" readonly value="<?= $editGuruL['author']; ?>"name="nip">
                    </div>
                    <div class="form-group">
                      <label>Deskripsi Mata Pelajaran</label>
                      <textarea class="form-control" name="deskripsi"><?= $editGuruL['keterangan']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Matapelajaran</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <?php $date = date_create($editGuruL['tgl_mapel']); ?>
                        <input type="datetime-local" class="form-control" name="tgl_sampai" min="<?= date_format($date,'Y-m-d\TH:i') ?>" value="<?= date_format($date,'Y-m-d\TH:i') ?>">
                      </div>
                    </div>
                    <div class="form-group">
                    <label>Dokumen Lama</label><br>
                    <a href="<?= base_url('mapel/file/'.$editGuruL['dokumen']); ?>"> <i class="fas fa-fw fa-file-pdf"></i> <?= $editGuruL['dokumen']; ?></a>
                    </div>
                    <div class="form-group">
                        <label>Upload Dokumen</label>
                        <input name="dokumen" type="file" class="form-control"/>
                        <input name="dokumen1" type="hidden" value="<?= $editGuruL['dokumen'];  ?>" class="form-control"/>
                      </div>
                      <button class="btn btn-primary btn-block" type="submit">Submit</button>
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