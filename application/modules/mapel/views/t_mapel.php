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
                            <h4>Tabel Data Matapelajaran</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white" data-bs-toggle="modal" data-bs-target="#inlineForm"> <i class="fa fa-plus"></i> Add New Matapelajaran</a>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kode Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    <?php foreach ($matpel as $m) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $m['nama_matpel']; ?></td>
                                            <td><?= $m['kode_matpel']; ?></td>
                                            <td class="text-center">
                                                <a class="btn waves-effect waves-light btn-success text-white" data-bs-toggle="modal" data-bs-target="#inlineForm1<?= $m['id_matpel']; ?>" > <i class="fa fa-pencil-alt"></i> Edit</a>
                                                <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('mapel/delete_matpel/' . $m['id_matpel']) ?>"> <i class="fa fa-trash"></i> Delete</a>
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
                            <h4 class="modal-title text-white" id="myModalLabel33">Form Tambah Matapelajaran</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">X
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="<?= base_url('mapel/addmatpel'); ?>" method="post">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="menuname">Matapelajaran</label>
                                <input class="form-control" type="text" id="matpel" name="matpel" required>
                            </div>
                            <div class="form-group">
                                <label for="menuname">Kode Matapelajaran</label>
                                <input class="form-control" type="text" id="kode" name="k_matpel" required>
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
            <?php foreach ($matpel as $m) : ?>
            <!--Submenu Edit form Modal -->
            <div class="modal fade text-left" id="inlineForm1<?= $m['id_matpel']; ?>" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-white" id="myModalLabel33">Edit Form Matapelajaran</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">X
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="<?= base_url('mapel/editmatpel'); ?>" method="post">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="menuname">Matapelajaran</label>
                                <input class="form-control" type="hidden" id="id" name="id" value="<?= $m['id_matpel']; ?>" required>
                                <input class="form-control" type="text" id="matpel" name="matpel" value="<?= $m['nama_matpel']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="menuname">Kode Matapelajaran</label>
                                <input class="form-control" type="text" id="kode" name="k_matpel" value="<?= $m['kode_matpel']; ?>" required>
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
            <?php endforeach; ?>