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
            <h2 class="section-title">Form Upload Materi Pelajaran</h2>
            <p class="section-lead">Silahkan masukan materi pelajaran yang baru !.</p>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-10">
                  <div class="card">
                    <div class="container">
                  <div class="card-header">
                    <h4>Form Input</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                      <form action="<?= base_url('mapel/addmapel') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Kode Mata Pelajaran</label>
                      <input type="text" class="form-control" readonly name="kode" value="<?php echo $id_m_mapel ?>">
                    </div>
                    <div class="form-group">
                      <label>Judul Materi</label>
                      <input type="text" class="form-control" name="judul" id="judul">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" readonly value="<?= $data_guru['id_matpel']; ?>"name="mapel">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" readonly value="<?= $data_guru['nip']; ?>"name="nip">
                    </div>
                    <div class="form-group">
                      <label>Deskripsi Mata Pelajaran</label>
                      <textarea class="form-control" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Kelas</label><br>
                      <select style="width:40%" class="form-control select2" name="kelas">
                        <?php foreach($kelas as $k) : ?>
                            <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Pembuatan</label>
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
                        <input type="datetime-local" class="form-control" name="tgl_sampai" min="<?= date_format($date,'Y-m-d\TH:i') ?>" value="<?= date_format($date,'Y-m-d\TH:i') ?>">
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Upload Dokumen</label>
                        <input name="dokumen" type="file" class="form-control"/>
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