      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('kelas'); ?>">Halaman Belajar</a></div>
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
          <?= $this->session->flashdata('message'); ?>
            <h2 class="section-title">Hi, <?= $user['name'] ?>!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Profile</h4>
                  </div>
                  <div class="col-6 col-sm-3 col-lg-3 mx-auto mb-4 mb-md-0">
                        <div class="avatar-item">
                          <a href="" data-toggle="modal" data-target="#exampleModal<?= $user['id'];?>">
                            <img alt="image" src="<?= base_url('assets/images/faces/'). $data_profile['image']; ?>" width="85%" class="rounded-circle" data-toggle="tooltip" title="<?= $user['name']; ?>">
                          </a>
                          <div class="avatar-badge mx-5"> <a href="" class="btn"><i class="fas fa-pencil-alt"></i></a></div>
                        </div>
                      </div>
                  <form action="<?= base_url('Profil/edit_profile_siswa/') ?>" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate="">
                    <div class="card-body">
                      <div class="row">
                      <div class="form-group col-md-6 col-12">
                          <label> First Name</label>
                          <input type="hidden" class="form-control" name="id_siswa" value="<?= $data_profile['id_siswa']; ?>" required="">
                          <input type="hidden" class="form-control" name="id" value="<?= $user['id']; ?>" required="">
                          <input id="fname" type="text" class="form-control" name="fname" value="<?= $data_profile['f_name']; ?>" autofocus>
                          <?= form_error('fname', '<small class="text-danger pl-2">','</small>'); ?>
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label> Last Name</label>
                          <input id="lname" type="text" class="form-control" name="lname" value="<?= $data_profile['l_name']; ?>" autofocus>
                          <?= form_error('lname', '<small class="text-danger pl-2">','</small>'); ?>
                        </div>
                      </div>
                        <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>NISN</label>
                            <input type="text" readonly class="form-control" name="nisn" value="<?= $data_profile['nisn']; ?>" required="">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="telephone" value="<?= $data_profile['telephone']; ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Guru Wali</label>
                            <select class="form-control select2" name="wali_kelas">
                                <option value="<?= $data_profile['wali_kelas']; ?>"><?= $data_profile['nama_guru']?></option>
                                <option disabled>-- Pilihan --</option>
                                <?php foreach($gurus as $g) : ?>
                                    <option value="<?= $g['id_guru']; ?>"><?= $g['nama_guru']?></option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Kelas</label>
                            <input type="text" class="form-control" readonly value="<?= $data_profile['nama_kelas']; ?>">
                            <input type="hidden" class="form-control" name="kelas" readonly value="<?= $data_profile['id_kelas']; ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Alamat</label>
                            <textarea class="form-control summernote-simple" name="alamat"><?= $data_profile['alamat']; ?></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" id="toastrs1-2">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      
      <!-- Modal -->
      <?php $i =1;?>
      <?php foreach ($users as $l) :?>
      <div class="modal fade" id="exampleModal<?= $l['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Foto Profil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('profil/edit_foto/') ?>" method="POST" enctype="multipart/form-data">
            <div class=text-center>
              <img alt="image" src="<?= base_url('assets/images/faces/'). $l['image']; ?>" width="35%" class="img-thumbnail" data-toggle="tooltip">
            </div>
                    
                    <div class="form-group">
                        <label>Upload Images</label>
                        <input name="id"   type="hidden" value="<?= $l['id'] ?>" class="form-control"/>
                        <input name="email"type="hidden" value="<?= $l['email'] ?>" class="form-control"/>
                        <input name="nomor"type="hidden" value="<?= $l['nomor'] ?>" class="form-control"/>
                        <input name="name" type="hidden" value="<?= $l['name'] ?>" class="form-control"/>
                        <input type="file" name="image" class="form-control" id="customFile">
                        <input type="hidden" name="image1" class="form-control" value="<?= $user['image'] ?>">
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
      