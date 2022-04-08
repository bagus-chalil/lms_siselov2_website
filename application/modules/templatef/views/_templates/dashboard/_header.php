<!DOCTYPE html>
<html>

<head>

	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$title?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<!-- Required CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/skin-purple.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/pace/pace-theme-flash.css">
	
	<!-- Datatables Buttons -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/plugins/Buttons-1.5.6/css/buttons.bootstrap.min.css">

	<!-- textarea editor -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/codemirror/lib/codemirror.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/froala_editor/css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/froala_editor/css/froala_style.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/froala_editor/css/themes/royal.min.css">
	<!-- /texarea editor; -->

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/mystyle.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<!-- Must Load First -->
<script src="<?=base_url()?>assets/bower_components/jquery/jquery-3.3.1.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/select2/js/select2.full.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>		

<script type="text/javascript">
	let base_url = '<?=base_url()?>';
</script>

<body class="hold-transition skin-purple sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
		<a href="<?=base_url('dashboard')?>" class="logo">
				<span class="logo-mini"><b>CBT</b></span>
				<span class="logo-lg"><b>SISELO </b>CBT V2</span>
			</a>

			<nav class="navbar navbar-static-top" role="navigation">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- The user image in the navbar-->
								<img src="<?=base_url()?>assets/dist/img/user1.png" class="user-image" alt="User Image">
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<span class="hidden-xs">Hi, <?=$user['name']?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="<?= base_url('assets/images/faces/'). $user['image']; ?>" class="img-circle" alt="User Image">
									<p>
										<?=$user['email']?>
									</p>
									<p>
										<?=$user['nip']?>
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-footer">
									<div class="pull-right">
									<?php $id=$this->session->userdata('id');?>
										<a href="<?= base_url('login/logout/'.$id) ?>" class="btn btn-default btn-flat">Logout</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Sidebar -->
		<?php require_once("_sidebar.php"); ?>
		<!-- /.sidebar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					<?=$title?>
					<small>Data Soal Ujian</small>
				</h1>
				<ol class="breadcrumb">
				<?php if($user['role_id']==2) :?>
					<li><a href="<?= base_url('Guru')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<?php endif; ?>
					<?php if ($user['role_id']==3) : ?>
						<li><a href="<?= base_url('Kelas') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<?php endif; ?>
					<li class="active"><?=$title;?></li>
					<li class="active">Data Soal</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content container-fluid">

		