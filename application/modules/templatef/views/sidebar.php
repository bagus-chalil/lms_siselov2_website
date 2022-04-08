<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">LMS SISELO V2</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">LMS SISELO V2</a>
          </div>
          <ul class="sidebar-menu">
              <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "Select `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id`=`user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id`=$role_id AND `user_menu`.`id` != 13
                            ORDER BY `user_access_menu`.`menu_id` ASC
                            ";
                $menu = $this->db->query($queryMenu)->result_array();
              ?>
          <?php foreach ($menu as $m) : ?>
            <li class="menu-header"><?= $m['menu'] ?></li>
                          <?php
                            $menuId = $m['id'];
                            $querySubMenu = "Select*
                                            FROM `user_sub_menu` 
                                            WHERE `menu_id`=$menuId
                                            AND `is_active`=1 AND `menu_id` != 13
                            ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                          ?>
            <?php foreach ($subMenu as $sm) : ?>
              <?php if($title == $sm['title']) :?>
              <li class="active">
              <?php else : ?>
                <li class="">
              <?php endif; ?>
              <a class="nav-link active" href="<?= base_url($sm['url']) ?>"><i class="<?= $sm['icon']; ?>"></i> <span><?= $sm['title'] ?></span>
              </a>
              </li> 
              <?php endforeach ?>
            <?php endforeach ?>
            <?php 
            $role_id = $this->session->userdata('role_id');
            if ($role_id== 4) { ?>
              <li class="menu-header"> Halaman Utama </li>
              <li><a class="nav-link active" href="<?= base_url('website') ?>"><i class="fas fa-globe-asia"></i> <span> Website </span></a></li>
              <li class="menu-header"> Profil </li>
              <li><a class="nav-link active" href="<?= base_url('profil') ?>"><i class="fas fa-user-edit"></i> <span> Profil </span></a></li>
            <?php }else{?>
              <li class="menu-header"> Ujian Online </li>
            <li><a class="nav-link active" href="<?= base_url('soal') ?>"><i class="fas fa-file-import"></i> <span> Halaman Ujian </span></a></li>
            <?php } ?>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div>        
        </aside>
      </div>
