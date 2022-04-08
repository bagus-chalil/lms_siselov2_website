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
                            <h3>DataTable</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Data Pengumuman</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white" data-bs-toggle="modal" data-bs-target="#inlineForm"> <i class="fa fa-plus"></i> Add New Pengumuman</a>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Title</th>
                                        <th>Deskripsi</th>
                                        <th>Dokumen</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    <?php foreach ($pengumuman as $pm) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $pm['judul']; ?></td>
                                            <td><?= $pm['deskripsi']; ?></td>
                                            <td><?= $pm['dokumen']; ?></td>
                                            <td><?= format_indo($pm['tgl_pengumuman'])."|".waktu_indo($pm['tgl_pengumuman']);?>WIB</td>
                                            <td>
                                            <?php if ($pm['status_pengumuman'] == 0) { ?>
                                            <span class="badge rounded-pill bg-warning text-white">Tidak aktif</span>
                                            <?php } else if ($pm['status_pengumuman'] == 1 ){ ?>
                                                <span class="badge rounded-pill bg-success text-white">Aktif</span>
                                            <?php }else { ?>
                                            <?= $pm['status_pengumuman']; ?>
                                                <span class="badge rounded-pill bg-danger text-dark">Tidak ditemukan</span>
                                            <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url('pengumuman/data_edit/' . $pm['id_pengumuman']) ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                                <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('pengumuman/deletePengumuman/' . $pm['id_pengumuman']) ?>"> <i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </section>
            </div>

            <!--Submenu Add form Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-white" id="myModalLabel33">Form Tambah Pengumuman</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">X
                                <i data-feather="x"></i>
                            </button>
                        </div>
                            <div class="modal-body">
                            <form action="<?= base_url('pengumuman/addPengumuman') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul Pengumuman</label>
                                <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $user['id']; ?>">
                                <input type="text" class="form-control" name="judul" id="judul">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Pengumuman</label>
                                <textarea name="isi" id="default" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pembuatan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    </div>
                                    <input type="datetime-local" class="form-control" name="tgl_pengumuman" min="<?= date('Y-m-d\TH:1') ?>" value="<?= date('Y-m-d\TH:i') ?>" placeholder="Stasiun Tujuan" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label>Upload Dokumen</label>
                                <input name="dokumen" type="file" class="form-control"/>
                            </div>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           