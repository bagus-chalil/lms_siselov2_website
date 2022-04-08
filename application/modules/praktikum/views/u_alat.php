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
                            <h4>Tabel Data Alat praktikum</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white" data-bs-toggle="modal" data-bs-target="#inlineForm"> <i class="fa fa-plus"></i> Add New Alat Praktikum</a>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Nama alat</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th class="text-center">Gambar</th>
                                        <th>Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    <?php foreach ($alat as $a) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $a['nama_alat']; ?></td>
                                            <td><?= $a['nama_matpel']; ?></td>
                                            <td><?= $a['nama_kelas']; ?></td>
                                            <td class="text-center"><img src="<?= base_url('assets/images/alat/' . $a['gambar']); ?>" class="img-thumbnail" width="17%"></td>
                                            <td><?= $a['stok']; ?></td>
                                            <td class="text-center">
                                                <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url('praktikum/editAlat/'.$a['id']); ?>"> <i class="fas fa-fw fa-wrench"></i> Edit</a>
                                                <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('praktikum/hapusAlat/'.$a['id']); ?>"> <i class="fas fa-fw fa-trash-alt"></i> Delete</a>
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
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-white" id="myModalLabel33">Form Tambah Alat Praktikum</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">X
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="<?= base_url('praktikum/addAlat'); ?>" enctype="multipart/form-data" method="post">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="menuname">Nama Alat Praktikum</label>
                                <input class="form-control" type="text" id="nama_alat" name="nama_alat" required>
                            </div>
                            <div class="form-group">
                                <label for="menuname">Mata Pelajaran</label>
                                <select name="matpel_id" id="matpel_id" class="form-control chosen" required>
                                <option value="" selected disabled>Select Mata Pelajaran</option>
                                    <?php foreach ($matpel as $m) :?>
                                      <option value="<?= $m['id_matpel'];?>"><?= $m['nama_matpel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="menuname">Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-control chosen" required>
                                    <option value="" selected disabled>Select Kelas</option>
                                    <?php foreach ($kelas as $k) :?>
                                      <option value="<?= $k['id_kelas'];?>"><?= $k['nama_kelas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="menuname">Stok Alat Praktikum</label>
                                <input class="form-control" type="number" id="stok" name="stok" required>
                            </div>
                            <div class="form-group">
                              <label>Upload Images</label>
                              <input type="file" name="gambar" class="form-control" id="customFile">
                            </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" required id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">I
                                            accept <a href="#">Terms and Conditions</a></label>
                                    </div>
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
           