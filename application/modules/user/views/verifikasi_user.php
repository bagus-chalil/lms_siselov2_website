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
                        <?php foreach ($users as $s) :?>
                            <h4>Tabel Data User Level <?= $s['role']; ?></h4>
                        <?php endforeach; ?>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Identitas</th>
                                        <th>No. Identitas</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                        <?php foreach ($users as $s) :?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $s['name']; ?></td>
                                                <td><?= $s['nama_identitas']; ?></td>
                                                <td><?= $s['nomor']; ?></td>
                                                <?php if ($s['role_id'] == 4 ) { ?>
                                                    <td class="text-center">
                                                        <?php if ($s['identitas_id'] == 3) {?>
                                                        <form action="<?= base_url('User/verified_user_siswa/') ?>" method="POST">
                                                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $s['id']; ?>">
                                                            <input type="hidden" class="form-control" id="name" name="name" value="<?= $s['name']; ?>">
                                                            <input type="hidden" class="form-control" id="nomor" name="nomor" value="<?= $s['nomor']; ?>">
                                                            <input type="hidden" class="form-control" id="identitas" name="identitas" value="<?= $s['identitas_id']; ?>">
                                                            <input type="hidden" class="form-control" id="role_id" name="role_id" value="<?= $s['identitas_id']; ?>">
                                                            <input type="hidden" class="form-control" id="verifikasi_user" name="verifikasi_user" value="3">
                                                            <button type="submit" class="btn btn-primary"> <i class="fas fa-check-square"></i> Verifikasi</button>
                                                        </form>
                                                        <?php }else { ?>
                                                        <form action="<?= base_url('User/verified_user_guru/') ?>" method="POST">
                                                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $s['id']; ?>">
                                                            <input type="hidden" class="form-control" id="name" name="name" value="<?= $s['name']; ?>">
                                                            <input type="hidden" class="form-control" id="nomor" name="nomor" value="<?= $s['nomor']; ?>">
                                                            <input type="hidden" class="form-control" id="identitas" name="identitas" value="<?= $s['identitas_id']; ?>">
                                                            <input type="hidden" class="form-control" id="role_id" name="role_id" value="<?= $s['identitas_id']; ?>">
                                                            <input type="hidden" class="form-control" id="verifikasi_user" name="verifikasi_user" value="3">
                                                            <button type="submit" class="btn btn-primary"> <i class="fas fa-check-square"></i> Verifikasi</button>
                                                        </form>
                                                        <?php } ?>
                                                        <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('user/delete_role/' .$s['id']) ?>"> <i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                <?php }else { ?>
                                                    <td class="text-center">
                                                        <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('user/delete_role/' .$s['id']) ?>"> <i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </section>
            </div>
<!-- Modal -->
<?php $i =1;?>
      <?php foreach ($users1 as $l) :?>
      <div class="modal fade" id="exampleModal<?= $l['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="toastrs1-2" >Save changes</button>
          </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>