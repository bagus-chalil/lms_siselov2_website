  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/images/faces/'). $user['image']; ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user['name']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <?php 
                $now = time();
                $waktu=$user['last_login'];
                $hasil=$now-$waktu;
                $hasil1=date('i' ,$hasil);
              ?>
                <?php if($hasil1 < 60){?>
                  <div class="dropdown-title">Logged in <?= $hasil1 ?> min ago</div>
                <?php }else{?>
                  <div class="dropdown-title">Logged in 1 Hour ago</div>
                <?php } ?>

              <?php if($user['role_id'] == 2){?>
                <a href="<?= base_url('profil/')?>" class="dropdown-item has-icon">
                  <i class="fas fa-user"></i> Profile
                </a>
              <?php }else{?>
                <a href="<?= base_url('profil/profile_guest')?>" class="dropdown-item has-icon">
                  <i class="fas fa-user"></i> Profile
                </a>
              <?php } ?>

              <!-- <?php if($user['role_id'] == 2){?>
                <a href="<?= base_url('profil/profil_data_guru')?>" class="dropdown-item has-icon">
                  <i class="fas fa-user"></i> Data Kelas
                </a>
              <?php }else{?>
              <?php } ?> -->

              <!-- Change Password -->
              <?php if($user['role_id'] != 4){?>
                <a href="<?= base_url('profil/change_password')?>" class="dropdown-item has-icon">
                  <i class="fas fa-key"></i> Change Password
                </a>
              <?php }else{?>
              <?php } ?>

              <!-- Home -->
              <?php if($user['role_id'] == 2){?>
                <a href="<?= base_url('guru')?>" class="dropdown-item has-icon">
                  <i class="fas fa-home"></i> Home
                </a>
              <?php }else{?>
                <a href="<?= base_url('website')?>" class="dropdown-item has-icon">
                  <i class="fas fa-home"></i> Home
                </a>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <?php $id=$this->session->userdata('id');?>
              <a href="<?= base_url('login/logout/'.$id); ?>#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- navbar -->