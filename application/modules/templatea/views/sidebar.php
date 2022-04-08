<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url() ?>assets/images/logo/logo1.png"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "Select `user_menu`.`id`,`menu`
                                    FROM `user_menu` JOIN `user_access_menu`
                                    ON `user_menu`.`id`=`user_access_menu`.`menu_id`
                                    WHERE `user_access_menu`.`role_id`=$role_id
                                    ORDER BY `user_access_menu`.`menu_id` ASC
                                    ";
                        $menu = $this->db->query($queryMenu)->result_array();
                        ?>
                    <ul class="menu">
                        <?php foreach ($menu as $m) : ?>
                            <li class="sidebar-item active"> 
                            <li class="sidebar-title"><?= $m['menu'] ?></li>
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
                                <li class="sidebar-item active">
                            <?php else : ?>
                                <li class="sidebar-item">
                            <?php endif; ?>
                                <a href="<?= base_url($sm['url']) ?>" class='sidebar-link'>
                                <i class="<?= $sm['icon']; ?>"></i>
                                    <span><?= $sm['title'] ?></span>
                                </a>
                            </li>
                            
                            <?php endforeach ?>
                            <?php endforeach ?>
                        </li>


                        <li class="sidebar-title">Advance features</li>
                        <li class="sidebar-item">
                        <?php $id=$this->session->userdata('id');?>
                            <a href="<?= base_url('login/logout/'.$id) ?>" class='sidebar-link'>
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                                <i class="bi bi-puzzle"></i>
                                <span>Contribute</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Donate</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>