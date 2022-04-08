<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>
          <div class="section-body">
          <?= $this->session->flashdata('message'); ?>
            <h2 class="section-title">Hi, <?= $user['f_name'] ?>!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>
            <div class="row mt-sm-4">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Kelas Guru</h4>
                  </div>
                 <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <!-- <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white" data-bs-toggle="modal" data-bs-target="#inlineForm"> <i class="fa fa-plus"></i> Add New </a> -->
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>kelas</th>
                                        <th>Matapelajaran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                        <?php foreach ($kelas_guru as $r) :?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $r['nama_kelas']; ?></td>
                                                <td><?= $r['nama_matpel']; ?></td>
                                                <td class="text-center">
                                                <a class="btn btn-primary btn-lg text-white btn-block" data-toggle="modal" data-target="#exampleModalCenter<?= $r['kelas_id']; ?>" > <i class="fas fa-pen"> Edit </i></a>
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
      </div>

      <!-- Modal Kelas -->
      <?php foreach ($kelas_guru as $r) :?>
      <div class="modal fade" id="exampleModalCenter<?= $r['kelas_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Matapelajaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('profil/edit_kelas_matapelajaran/') ?>" method="POST">     
            <div class="form-group col-md-12 col-12 col-lg-12">
            <label>Nama Kelas </label>
              <input type="text" readonly class="form-control" name="" value="<?= $r['nama_kelas']; ?>" required>
              <input type="hidden" class="form-control" name="kelas_id" value="<?= $r['kelas_id']; ?>" required>
              <input type="hidden" class="form-control" name="id" value="<?= $r['id']; ?>" required>
              <input type="hidden" class="form-control" name="guru_id" value="<?= $r['guru_id']; ?>" required>
            </div> 
            <div class="form-group col-md-12 col-12 col-lg-12">
              <label for="">Masukkan Matapelajaran : </label>
                <select class="form-control select" name="matpel_id">
                  <?php foreach ($matpel as $m) : ?>
                    <option value="<?= $m['id_matpel'] ?>"><?= $m['nama_matpel'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
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