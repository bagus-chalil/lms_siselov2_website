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
                            <p class="text-subtitle text-muted">For kelas to check they list</p>
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
                            <h4>Tabel Data Kelas</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <!-- <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white" data-bs-toggle="modal" data-bs-target="#inlineForm"> <i class="fa fa-plus"></i> Add New </a> -->
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>kelas</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                        <?php foreach ($kelas as $r) :?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $r['nama_kelas']; ?></td>
                                                <td class="text-center">
                                                <a class="btn waves-effect waves-light btn-warning text-white" href="<?= base_url('Mapel/relasiGuru/' .$r['id_kelas']) ?>"> <i class="fa fa-pencil-alt"></i> Data Guru</a>
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