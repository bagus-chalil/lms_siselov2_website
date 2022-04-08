<footer class="main-footer">
        <div class="footer-left">
        <?php
                $tanggal = time () ;
                $tahun= date("Y",$tanggal);
                echo "Copyright - Siselo &copy;" . $tahun;
                ?>
                <div class="bullet"></div> 
                Design By <a href="https://dinus.ac.id/mahasiswa/A22.2019.02733">Mohammad Bagus Chalil A</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?= base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?= base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?= base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/prism/prism.js"></script>
  <script src="<?= base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?= base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>assets/js/page/index.js"></script>
  <script src="<?= base_url(); ?>assets/js/page/modules-sweetalert.js"></script>
  <script src="<?= base_url(); ?>assets/js/page/modules-toastr.js"></script>
  <script src="<?= base_url(); ?>assets/js/page/modules-datatables.js"></script>
  
  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>
  <script src="<?= base_url(); ?>assets/dist/js/dropify.min.js"></script>

  <!--Custom Text Area -->
  <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
  <script>
      CKEDITOR.replace('deskripsi');
      CKEDITOR.replace('deskripsi2');
  </script>
  <!-- Alert -->
  <script type="text/javascript">
    $("#toastr-2").click(function() {
    iziToast.success({
      title: 'Edit Success!',
      message: 'Silahkan Pastikan data telah benar',
      position: 'topRight'
    });
  });
  </script>
  <script type="text/javascript">
    $("#toastrs-2").click(function() {
    iziToast.success({
      title: 'Hapus Success!',
      message: 'Silahkan Pastikan data telah benar',
      position: 'topRight'
    });
  });
  </script>
  <script type="text/javascript">
    $("#toastrs1-2").click(function() {
    iziToast.success({
      title: 'Update Profile Berhasil!',
      message: 'Silahkan Pastikan data telah benar',
      position: 'topRight'
    });
  });
  </script>

  <!--Custom Text Area -->
  <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
  <script>
      CKEDITOR.replace('deskripsi');
      CKEDITOR.replace('deskripsi2');
  </script>
  <script type="text/javascript">
    $("#toastrs1-2").click(function() {
    iziToast.success({
      title: 'Pinjam Alat Praktikum Berhasil!',
      message: 'Silahkan Hubungi Petugas Sekolah',
      position: 'topRight'
    });
  });
  </script>
  
<script type="text/javascript">
	function sisawaktu(t) {
		var time = new Date(t);
		var n = new Date();
		var x = setInterval(function() {
			var now = new Date().getTime();
			var dis = time.getTime() - now;
			var h = Math.floor((dis % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60));
			var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
			var s = Math.floor((dis % (1000 * 60)) / (1000));
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);
			var cd = h + ":" + m + ":" + s;
			$('.sisawaktu').html(cd);
		}, 100);
		setTimeout(function() {
			waktuHabis();
		}, (time.getTime() - n.getTime()));
	}

	function countdown(t) {
		var time = new Date(t);
		var n = new Date();
		var x = setInterval(function() {
			var now = new Date().getTime();
			var dis = time.getTime() - now;
			var d = Math.floor(dis / (1000 * 60 * 60 * 24));
			var h = Math.floor((dis % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
			var s = Math.floor((dis % (1000 * 60)) / (1000));
			d = ("0" + d).slice(-2);
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);
			var cd = d + " Hari, " + h + " Jam, " + m + " Menit, " + s + " Detik ";
			$('.countdown').html(cd);

			setTimeout(function() {
				location.reload()
			}, dis);
		}, 1000);
	}

	function ajaxcsrf() {
		var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
		var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
		var csrf = {};
		csrf[csrfname] = csrfhash;
		$.ajaxSetup({
			"data": csrf
		});
	}

	$(document).ready(function() {
		setInterval(function() {
			var date = new Date();
			var h = date.getHours(),
				m = date.getMinutes(),
				s = date.getSeconds();
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);

			var time = h + ":" + m + ":" + s;
			$('.live-clock').html(time);
		}, 1000);
	});
</script>
</body>
</html>