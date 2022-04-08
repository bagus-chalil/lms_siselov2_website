<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<?php
$this->load->view('style');
$id = $user['id'];
$nama = $user['name'];
// var_dump($_SESSION);die;
?>

<head>
	<title>Chat</title>
	<!-- Template CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<style>
	.user_img_msg {
		height: 20% !important;
		width: 20% !important;
		/* border: 1.5px solid #f5f6fa; */
	}

	#textnya {
		font-size: large;
		font: message-box;
		font-weight: bolder;
	}
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?= base_url(); ?>">LMS SISELO</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarScroll">
		<ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
		<li class="nav-item active">
			<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Link</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
			Link
			</a>
			<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
			<li><a class="dropdown-item" href="#">Action</a></li>
			<li><a class="dropdown-item" href="#">Another action</a></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item" href="#">Something else here</a></li>
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link disabled">Link</a>
		</li>
		</ul>
		<form class="d-flex">
		<input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success" type="submit">Search</button>
		</form>
	</div>
	</nav>
	<div class="container-fluid h-100">
		<div class="row justify-content-center h-100">
			<div class="col-md-4 col-xl-3 chat">
				<div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>

					<div class="card-body contacts_body">
						<ui class="contacts">
							<li class="profileku">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
									<img src="<?= base_url('assets/images/faces/'). $user['image']; ?>" class="rounded-circle user_img_ku">
									</div>
									<div class="user_info_ku">
										<span><?= $user['name'] ?></span>
									</div>
									<div class="user_info_ku iconya">
										<i class="fas fa-cog" style="
											color: aliceblue;
											margin-top: 10px;
										"></i>
									</div>
									<div class="user_info_ku iconya">
										<span class="keluar">
											<i class="fas fa-sign-out-alt" style="
											color: aliceblue;
											margin-top: 10px;
										"></i>
										</span>

									</div>
								</div>
							</li>
						</ui>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts" id="yangAktif">
							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
									<img src="<?= base_url('assets/images/faces/'). $user['image']; ?>" class="rounded-circle user_img_ku">
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Khalid</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
									<img src="<?= base_url('assets/images/faces/'). $user['image']; ?>" class="rounded-circle user_img_ku">
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Khalid</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
						</ui>

					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<div class="col-md-8 col-xl-6 chat">
				<div class="card">
					<div class="card-header msg_head">

					</div>
					<div class="card-body msg_card_body" id="letakpesan">
						<div class="d-flex justify-content-start mb-4">
							<div class="text-center">
								<img src="https://sintesa.net/wp-content/uploads/2019/05/livechat.png" class="rounded-circle user_img_msg">
								<br>
								<p class="text-center" id="textnya">Hay, <?= $nama ?>, <br>Ayo Chat temanmu Sekarang !, </p>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</body>
<script>
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	$(document).ready(function() {
		$('.keluar').click(function(e) {

			Swal.fire({
				title: 'Anda Akan Keluar?',
				text: "Apakah Anda Yakin Akan keluar ? ",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "post",
						url: "<?= base_url() ?>/login/logout",
						// data: "data",
						dataType: "json",
						success: function(r) {
							// console.log(r)
							// return false
							if (r) {
								Swal.fire(
									'success!',
									r.pesan,
									'success'
								)
								setTimeout(() => {
									location.href = '<?= base_url() ?>login';
								}, 1000);
							} else {
								'error!',
								r.pesan,
								'error'
							}

						}
					});

				}
			})

		});
		orang()

		function orang() {
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>Chat/GetAllOrang",
				data: {
					id: '<?= $id ?>'
				},
				dataType: "json",
				success: function(r) {
					var html = "";
					var d = r.data;
					id = '<?= $id ?>';
					d.forEach(d => {
						html += `
						<li class="active coba" data-id="${d.id}">
								<div class="d-flex bd-highlight ">
									<div class="img_cont ">
										<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
										<span class="online_icon " ></span>
									</div>
									<div class="user_info ">	
										<span class="">${d.name}</span>
										<p class="">${d.name} is online</p>
									</div>
								</div>
							</li>`;

					});
					$('#yangAktif').html(html);
				}
			});
		}
		$('body').on('click', '.coba', function() {
			var id = $(this).data('id');
			window.location.replace("<?= base_url() ?>Chat/" + id);

		});

	});
</script>

</html>
