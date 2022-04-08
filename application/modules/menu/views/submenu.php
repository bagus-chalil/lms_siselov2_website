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
                            <h4>Tabel Data Submenu</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white" data-bs-toggle="modal" data-bs-target="#inlineForm"> <i class="fa fa-plus"></i> Add New SubMenu</a>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Title</th>
                                        <th>Menu</th>
                                        <th>Url</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $sm['title']; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><?= $sm['icon']; ?></td>
                                            <td>
                                            <?php if ($sm['is_active'] == 0) { ?>
                                            <span class="badge rounded-pill bg-warning text-white">Tidak aktif</span>
                                            <?php } else if ($sm['is_active'] == 1 ){ ?>
                                                <span class="badge rounded-pill bg-success text-white">Aktif</span>
                                            <?php }else { ?>
                                            <?= $sm['is_active'] ?>
                                                <span class="badge rounded-pill bg-danger text-dark">Tidak ditemukan</span>
                                            <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url('menu/edit_submenu/' . $sm['id']) ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                                <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('menu/delete_submenu/' . $sm['id']) ?>"> <i class="fa fa-trash"></i> Delete</a>
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
                            <h4 class="modal-title text-white" id="myModalLabel33">Edit Form Menu</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">X
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="<?= base_url('menu/addsubmenu'); ?>" method="post">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="menuname">SubMenu Name</label>
                                <input class="form-control" type="text" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="menuname">SubMenu Name</label>
                                <select name="menu_id" id="menu_id" class="form-control chosen" required>
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="menuname">SubMenu URL</label>
                                <input class="form-control" type="text" id="url" name="url" required>
                            </div>
                            <div class="form-group">
                                <label for="menuname">SubMenu Icon</label>
                                <input class="form-control" type="text" id="icon" name="icon" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" required id="is_active" name="is_active" value="1" checked>
                                    <label class="custom-control-label" for="customCheck1">Is
                                        Active </label>
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
           