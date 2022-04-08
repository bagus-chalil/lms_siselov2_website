<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Alat Praktikum</h3>
                            <p class="text-subtitle text-muted">Form Edit</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Edit <?= $title ?></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <form action="<?= base_url('praktikum/edit_data_alat'); ?>" enctype="multipart/form-data" method="post">
                                    <div class="form-group">
                                        <label for="menuname">Nama Alat Praktikum</label>
                                        <input class="form-control" type="hidden" id="id" name="id" value="<?= $data_alat['id']?>" required>
                                        <input class="form-control" type="text" value="<?= $data_alat['nama_alat']?>" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="menuname">Mata Pelajaran</label>
                                        <select name="matpel_id" id="matpel_id" class="form-control chosen" required>
                                        <option value="<?= $data_alat['matpel_id']?>" selected><?= $data_alat['nama_matpel']?></option>
                                        <option value="" selected disabled>Pilih Mata Pelajaran</option>
                                            <?php foreach ($matpel as $m) :?>
                                            <option value="<?= $m['id_matpel'];?>"><?= $m['nama_matpel'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="menuname">Kelas</label>
                                        <select name="kelas_id" id="kelas_id" class="form-control chosen" required>
                                            <option value="<?= $data_alat['kelas_id']?>" selected><?= $data_alat['nama_kelas']?></option>
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            <?php foreach ($kelas as $k) :?>
                                            <option value="<?= $k['id_kelas'];?>"><?= $k['nama_kelas'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="menuname">Stok Alat Praktikum</label>
                                        <input class="form-control" type="number" value="<?= $data_alat['stok']?>" id="stok" name="stok" required>
                                    </div>
                                    <img src="<?= base_url('assets/images/alat/' . $data_alat['gambar']); ?>" class="img-thumbnail" width="25%">
                                    <div class="form-group">
                                    <label>Upload Images</label>
                                    <input type="file" name="gambar" class="form-control" id="customFile">
                                    <input type="hidden" name="gambar1"  value="<?= $data_alat['gambar']?>" class="form-control" id="customFile">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
            </div>