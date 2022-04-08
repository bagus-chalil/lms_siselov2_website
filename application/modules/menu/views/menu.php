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
                    <div class="row">
                    <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Data Menu</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                        <?php foreach ($menu as $m) :?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $m['menu']; ?></td>
                                                <td class="text-center">
                                                <a class="btn waves-effect waves-light btn-success text-white" data-bs-toggle="modal" data-bs-target="#inlineForm<?php echo $m['id']; ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                                <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('menu/delete_menu/' .$m['id']) ?>"> <i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data Menu</h4>
                        </div>
                        <div class="card-body">
                        <form class="form form-vertical"action="<?= base_url('menu/addmenu') ?>" method="post">
                                            <div class="form-body">
                                                <div class="row">
                                                <div class="form-group">
                                                    <label for="menuname">Menu Name</label>
                                                    <input class="form-control" type="text" id="menu" name="menu" required>
                                                        <br>
                                                        <button type="submit" class="btn btn-block btn-primary">Selesai</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                        </div>
                    </div>
                    </div>
                    </div>
                </section>
            </div>

            <!--Menu form Modal -->
            <?php 
            $i=0;
            foreach ($menu as $m) : $i++;?>
            <div class="modal fade text-left" id="inlineForm<?php echo $m['id']; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title text-white" id="myModalLabel33">Edit Form Menu</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">X
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('menu/edit_menu'); ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="menuname">Menu Name</label>
                                                                    <input class="form-control" type="hidden" id="id" value="<?= $m['id']; ?>" name="id">
                                                                    <input class="form-control" type="text" id="menu" value="<?= $m['menu']; ?>" name="menu" required>
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