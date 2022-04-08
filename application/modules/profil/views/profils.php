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
                  
                  <form action="<?= base_url('profil/edit_profil_guru/') ?>" method="POST" class="needs-validation" novalidate="">
                    <div class="card-body">

                      <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label> First Name</label>
                            <input type="hidden" class="form-control" name="id_guru" value="<?= $data_profile['id_guru']; ?>" required="">
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
                            <label>Nomor Induk Pegawai / Nomor Induk Guru</label>
                            <input type="text" readonly class="form-control" name="nip" value="<?= $data_profile['nip']; ?>" required="">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="telephoneg" value="<?= $data_profile['telephoneg']; ?>">
                            <?= form_error('telephoneg', '<small class="text-danger pl-2">','</small>'); ?>
                          </div>
                        </div>
                        <div class="row"> 
                        <!-- Kelas -->
                          <?php if($cek['guru'] > 0){?>
                            <div class="form-group col-md-5 col-6">
                              <label>Kelas Online</label>
                            <select class="form-control select2" name="kelas_id[]" multiple="multiple" disabled>
                              <?php 
                                $sk = [];
                                foreach ($kelas as $key => $val) {
                                    $sk[] = $val->id_kelas;
                                }
                                foreach ($all_kelas as $m) : 
                              ?>
                                <option <?=in_array($m->id_kelas, $sk) ? "selected" : "" ?> value="<?=$m->id_kelas?>"><?=$m->nama_kelas?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>  
                          <div class="form-group col-md-1 col-6 mt-4">
                            <a class="btn btn-primary btn-lg text-white btn-block" data-toggle="modal" data-target="#exampleModalCenter<?= $data_profile['id_guru']; ?>" > <i class="fas fa-pen"> </i></a>
                          </div>  
                            <?php }else{?>
                            <div class="form-group col-md-6 col-6">
                              <label>Kelas Online</label>
                              <select class="form-control select2" name="kelas_id[]" multiple="multiple">
                              <?php 
                                $sk = [];
                                foreach ($kelas as $key => $val) {
                                    $sk[] = $val->id_kelas;
                                }
                                foreach ($all_kelas as $m) : ?>
                                    <option <?=in_array($m->id_kelas, $sk) ? "selected" : "" ?> value="<?=$m->id_kelas?>"><?=$m->nama_kelas?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <?php }?>
                            <div class="form-group col-md-6 col-12">
                            <label>Guru Wali</label>
                            <select class="form-control select2" name="matpel">
                                <option value="<?= $data_profile['matpel_id']; ?>"><?= $data_profile['nama_matpel']?></option>
                                <option disabled>-- Pilihan --</option>
                                <?php foreach($matpel as $m) : ?>
                                    <option value="<?= $m['id_matpel']; ?>"><?= $m['nama_matpel']?></option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-12">
                            <label>Alamat</label>
                            <textarea class="form-control summernote-simple" value="<?= $data_profile['alamatg']; ?>"name="alamatg"><?= $data_profile['alamatg']; ?></textarea>
                          </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block mb-3" id="toastrs1-2">Save Changes</button>
                      </div>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Modal Foto -->
      <?php $i =1;?>
      <?php foreach ($users as $l) :?>
      <div class="modal fade" id="exampleModal<?= $l['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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

      <!-- Modal Kelas -->
      <?php foreach ($data_profile1 as $l) :?>
      <div class="modal fade" id="exampleModalCenter<?= $l['id_guru']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('profil/edit_kelas_guru/') ?>" method="POST">
            <div class=text-center>
              <img alt="image" src="<?= base_url('assets/images/faces/'). $l['image']; ?>" width="35%" class="img-thumbnail" data-toggle="tooltip">
            </div>     
            <div class="form-group col-md-12 col-12 col-lg-12">
            <label>Nama Guru</label>
              <input type="hidden" class="form-control" name="id_guru" value="<?= $l['id_guru']; ?>" required="">
                <input name="id" readonly type="text" value="<?= $l['name'] ?>" class="form-control"/>
            </div> 
            <div class="form-group col-md-12 col-12 col-lg-12">
              <label for="">Masukkan Kelas :</label>
                <select class="form-control select2" name="kelas_id[]" multiple="multiple">
                  <?php 
                    $sk = [];
                    foreach ($kelas as $key => $val) {
                        $sk[] = $val->id_kelas;
                    }
                    foreach ($all_kelas as $m) : ?>
                        <option <?=in_array($m->id_kelas, $sk) ? "selected" : "" ?> value="<?=$m->id_kelas?>"><?=$m->nama_kelas?></option>
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
