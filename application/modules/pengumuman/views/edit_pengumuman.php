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
                            <h3>Form Layout</h3>
                            <p class="text-subtitle text-muted">Multiple form layout you can use</p>
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
                                    <h4 class="card-title">Form Edit Pengumuman</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <form action="<?= base_url('pengumuman/editPengumuman/'.$pengumuman['id_pengumuman']) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Judul Pengumuman</label>
                                            <input type="hidden" class="form-control" name="id_pengumuman" id="id_pengumuman" value="<?= $pengumuman['id_pengumuman']; ?>">
                                <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $pengumuman['user_id']; ?>">
                                            <input type="text" class="form-control" name="judul" id="judul" value="<?= $pengumuman['judul'];  ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Pengumuman</label>
                                            <textarea name="isi" id="default" cols="30" rows="10"><?= $pengumuman['deskripsi'];  ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pembuatan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                                </div>
                                                <?php $date=$pengumuman['tgl_pengumuman'];  ?>
                                                <input type="datetime-local" class="form-control" name="tgl_pengumuman" min="<?= date('Y-m-d\TH:1') ?>" value="<?= date('Y-m-d\TH:i') ?>" placeholder="Stasiun Tujuan" required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Dokumen Lama</label><br>
                                            <a href="<?= base_url('pengumuman/file/'.$pengumuman['dokumen']); ?>"> <i class="fas fa-fw fa-file-pdf"></i> <?= $pengumuman['dokumen']; ?></a>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Dokumen</label>
                                            <input name="dokumen" type="file" class="form-control"/>
                                            <input name="dokumen1" type="hidden" value="<?= $pengumuman['dokumen'];  ?>" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="is_active" name="is_active" value="1" checked>
                                                <label class="custom-control-label" for="customCheck1">Is
                                                    Active </label>
                                            </div>
                                        </div>    
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
            </div>