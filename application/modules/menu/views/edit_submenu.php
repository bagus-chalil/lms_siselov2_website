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
                                    <h4 class="card-title">Form Edit Submenu</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="<?= base_url('menu/ubah_Submenu'); ?>" method="post">
                                            <div class="row">
                                            <div class="form-group">
                                            <label for="menuname">SubMenu Name</label>
                                            <input class="form-control" type="hidden" id="id" value="<?= $data_edit->id; ?>" name="id">
                                            <input class="form-control" type="text" id="title" value="<?= $data_edit->title; ?>" name="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="menuname">SubMenu Name</label>
                                            <select name="menu_id" id="menu_id" class="form-control" required>
                                                <option value=""><b>-- Selected Menu --</b></option>
                                                <option value="<?= $data_edit->menu_id; ?>"><?= $data_edit->menu;?></option>
                                                <option value="">-- Select Menu --</option>
                                                <?php foreach($menu as $m) : ?>
                                                    <option value="<?= $m['id'] ?>"><?= $m['menu']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="menuname">SubMenu URL</label>
                                            <input class="form-control" type="text" id="url" value="<?= $data_edit->url; ?>" name="url" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="menuname">SubMenu Icon</label>
                                            <input class="form-control" type="text" id="icon" value="<?= $data_edit->icon; ?>" name="icon" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="is_active" name="is_active" value="1" checked>
                                                <label class="custom-control-label" for="customCheck1">Is
                                                    Active </label>
                                            </div>
                                        </div>               
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" required
                                                    id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">I
                                                    accept <a href="#">Terms and Conditions</a></label>
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
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
            </div>