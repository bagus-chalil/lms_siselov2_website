<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= base_url('assets/images/faces/'). $user['image']; ?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?=$user['nisn']?></p>
				<small><?=$user['f_name']?></small>
			</div>
		</div>
		<?php if ($user['role_id'] == 1 OR $user['role_id'] ==2) { ?>
		<?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "Select `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id`=`user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`menu_id`=13
                            ";
                $menu = $this->db->query($queryMenu)->result_array();
              ?>
		<ul class="sidebar-menu" data-widget="tree">
			<?php foreach ($menu as $m) : ?>
			<li class="header"><?= $m['menu'] ?></li>
			<!-- Optionally, you can add icons to the links -->
			<?php
                            $menuId = $m['id'];
                            $querySubMenu = "Select*
                                            FROM `user_sub_menu` 
                                            WHERE `menu_id`=$menuId
                                            AND `is_active`=1
                            ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                          ?>
            <?php foreach ($subMenu as $sm) : ?>
				<?php if($title == $sm['title']) :?>
				<li class="active">
				<?php else : ?>
					<li class="">
				<?php endif; ?>
				<a href="<?= base_url($sm['url']) ?>"><i class="<?= $sm['icon']; ?>"></i> <span> <?= $sm['title'] ?></span>
					</a>
				</li>
			<?php endforeach ?>
            <?php endforeach ?>
			<li class="header">Mahasiswa</li>
			<li class=""><a href="<?= base_url('guru') ?>"><i class="fas fa-home"></i> <span> Home</span></a></li>
		</ul>
		<?php }else { ?>
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">Mahasiswa</li>
				<li class="active"><a href="<?= base_url('ujian') ?>"><i class="fas fa-edit"></i> <span> Ujian Online</span></a></li>
				<li class=""><a href="<?= base_url('kelas') ?>"><i class="fas fa-home"></i> <span> Home</span></a></li>
			</ul>
			<?php } ?>
	</section>
	<!-- /.sidebar -->
</aside>