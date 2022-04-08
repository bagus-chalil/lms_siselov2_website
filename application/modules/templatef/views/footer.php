<footer class="main-footer">
        <div class="footer-left">
        <?php
                $tanggal = time () ;
                $tahun= date("Y",$tanggal);
                echo "Copyright - Siselo &copy;" . $tahun;
                ?>
                <div class="bullet"></div> 
                Design By <a href="https://dinus.ac.id/mahasiswa/A22.2019.02733">Mohammad Bagus Chalil A </a>
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
  
</body>
</html>