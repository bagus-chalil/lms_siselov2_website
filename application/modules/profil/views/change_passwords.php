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
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Password</h4>
                  </div>
                  
                  <form action="<?= base_url('profil/change_password/') ?>" method="POST" class="needs-validation" novalidate="">
                    <div class="card-body">
                      <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>Old Password</label>
                            <input id="current_password" type="password" class="form-control" name="current_password" autofocus>
                            <?= form_error('current_password', '<small class="text-danger pl-2">','</small>'); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>New Password</label>
                            <input type="text" class="form-control" name="new_password1" required="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Repeat New Password</label>
                            <input type="text" class="form-control" name="new_password2" required="">
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
