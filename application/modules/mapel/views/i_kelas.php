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
                <!-- Basic Tables start -->
                <section class="section">
                    <div class="row" id="basic-table">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tabel Data Guru</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <?= $this->session->flashdata('message'); ?>
                                    <h4 class="card-title mt-2 mb-2">Kelas : <?= $kelas['nama_kelas'] ?></h4>
                                    <h6 class="card-subtitle mt-2">Untuk mengubah posisi kelas silahkan beri
                                        <code> checklist</code> pada nama guru yang diinginkan.
                                    </h6>
                                        <!-- Table with outer spacing -->
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>Kelas</th>
                                                    <th>Access</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i =1;?>
                                                <?php foreach ($guru as $m) :?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $m['nama_guru']; ?></td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                    <input class="form-check-input guru" type="checkbox" 
                                                                    <?= guru_access($kelas['id_kelas'], $m['id_guru']); ?>
                                                                    data-kelas="<?= $kelas['id_kelas'];?>" data-guru="<?= $m['id_guru']; ?>">
                                                                </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Tables end -->
            </div>
