<body class="layout-3" onload="startTime()">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="<?php echo base_url('kelas/');?>" class="navbar-brand sidebar-gone-hide">LMS - SISELO V2</a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
        </div>
        <form class="form-inline ml-auto">
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="<?= base_url('assets/images/faces/'). $user['image']; ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user['name'] ?></div></a>
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
              <a href="<?= base_url('profil/profil_siswa')?>" class="dropdown-item has-icon">
                <i class="fas fa-user"></i> Profile
              </a>
              <a href="<?= base_url('profil/change_password')?>" class="dropdown-item has-icon">
                <i class="fas fa-key"></i> Change Password
              </a>
              <a href="<?= base_url('kelas')?>" class="dropdown-item has-icon">
                <i class="fas fa-home"></i> Home
              </a>
              <div class="dropdown-divider"></div>
              <?php $id=$this->session->userdata('id');?>
              <a href="<?= base_url('login/logout/'.$id); ?>#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg ">
      <div class="container">
        <h4><?=strftime('%A, %d %B %Y')?></h4>
      </div>
        <div class="container justify-content-end">
          <ul class="navbar-nav">
              <h3 id="clock"></h3>            
          </ul>
        </div>
      </nav>
