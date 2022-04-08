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
                            <img alt="image" src="<?= base_url('assets/images/faces/'). $user['image']; ?>" width="85%" class="rounded-circle" data-toggle="tooltip" title="<?= $user['name']; ?>">
                          </a>
                          <div class="avatar-badge mx-5"> <a href="" class="btn"></a></div>
                        </div>
                      </div>
                  <form action="<?= base_url('profil/edit_profile_guest') ?>" method="POST" >
                    <div class="card-body">
                      <div class="row">                               
                        <div class="form-group col-6">
                            <label for="full name">First Name</label>
                            <input id="id" type="hidden" class="form-control" name="id" value="<?= $data_profile_guest['id']; ?>" autofocus>
                            <input id="fname" type="text" class="form-control" name="fname" value="<?= $data_profile_guest['f_name']; ?>" autofocus>
                            <?= form_error('fname', '<small class="text-danger pl-2">','</small>'); ?>
                        </div>
                            <div class="form-group col-6">
                            <label for="full name">Last Name</label>
                            <input id="lname" type="text" class="form-control" name="lname" value="<?= $data_profile_guest['l_name']; ?>">
                            <?= form_error('lname', '<small class="text-danger pl-2">','</small>'); ?>
                        </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" readonly value="<?= $data_profile_guest['email']; ?>" required="">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Masukkan Identitas</label><br>
                            <select class="form-control select2" name="identitas">
                              <option value="<?= $data_profile_guest['identitas_id']; ?>"><?= $data_profile_guest['nama_identitas']?></option>
                            <option disabled>-- Pilihan --</option>
                                <?php foreach($identitas as $i) : ?>
                                    <option value="<?= $i['id_identitas']; ?>"><?= $i['nama_identitas']?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Masukkan Nomor</label>
                            <input type="text" class="form-control" name="nomor" value="<?= $data_profile_guest['nomor']; ?>">
                          </div>
                        </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block mb-3" id="toastrs1-2">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>