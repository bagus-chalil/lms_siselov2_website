<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>SISELO Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="fas fa-fw fa-toolbox"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Alat Praktikum</h6>
                                                <h6 class="font-extrabold mb-0">
                                                <?= $get_alat['jml_alat'];?> / <?= $get_jmlalat['jml_alat'];?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="fas fa-fw fa-bullhorn"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Pengumuman</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?= $get_pengumuman['jml_pengumuman'];?> / <?= $get_jmlpengumuman['jml_pengumuman'];?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="fas fa-book-open"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">MataPelajaran</h6>
                                                <h6 class="font-extrabold mb-0"><?= $get_jmlmapel['jml_mapel'];?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="fab fa-fw fa-accusoft"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Kelas</h6>
                                                <h6 class="font-extrabold mb-0"><?= $get_jmlkelas['jml_kelas'];?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>SISELO Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                    <img alt="image" src="<?= base_url('assets/images/faces/'). $user['image']; ?>" width="85%" class="rounded-circle" data-toggle="tooltip">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold"><?= word_limiter($user['name'],1); ?></h5>
                                        <h6 class="text-muted mb-0">Administrator</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>SISELO User</h4>
                            </div>
                            <div class="card-body">
                            <?php foreach ($get_user as $gu) {
                                        $role[]= $gu->role;
                                        $position[]=$gu->position;
                                        
                                    }?>
                                <div id="chart-total-pie"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script>
		// @formatter:off
		document.addEventListener("DOMContentLoaded", function () {
			window.ApexCharts && (new ApexCharts(document.getElementById('chart-total-pie'), {
				chart: {
					type: "pie",
					fontFamily: 'inherit',
					height: 200,
					sparkline: {
						enabled: true
					},
					animations: {
						enabled: false
					},
				},
				fill: {
					opacity: 1,
				},
				series: <?= json_encode($position,JSON_NUMERIC_CHECK); ?>,
				labels: <?= json_encode($role); ?>,
				grid: {
					strokeDashArray: 4,
				},
				colors: ["#206bc4", "#79a6dc", "#bfe399", "#e9ecf1"],
				legend: {
					show: false,
				},
				tooltip: {
					fillSeriesColor: false
				},
			})).render();
		});
		// @formatter:on
		</script>