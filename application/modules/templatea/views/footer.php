<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Designed by Mohammad Bagus Chalil A</p>
                    </div>
                    <div class="float-end">
                    <?php
                $tanggal = time () ;
                $tahun= date("Y",$tanggal);
                echo "Copyright - Siselo &copy;" . $tahun;
                ?>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url(); ?>assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/dashboard.js"></script>

    <script src="<?= base_url(); ?>assets/js/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery/jquery.tagsinput.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/simple-datatables/simple-datatables.js"></script>	
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.bundle.js');?>"></script>
    <script src="<?= base_url(); ?>assets/vendor/chartist/dist/chartist.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!--Custom Text Area -->
    <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <script>
        CKEDITOR.replace('deskripsi');
        CKEDITOR.replace('deskripsi2');
    </script>
    <script src="<?= base_url(); ?>assets/vendors/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/tinymce/plugins/code/plugin.min.js"></script>
    <script>
        tinymce.init({ selector: '#default' });
        tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
    </script>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <!--Ajax Checkbox -->
    <script>
        $('.user').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('user/changeAccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('user/roleAccess/'); ?>" + roleId;
                }
            })

        });
    </script>
    <script>
        $('.relasi').on('click', function() {
            const kelasId = $(this).data('kelas');
            const matpelId = $(this).data('matpel');

            $.ajax({
                url: "<?= base_url('relasi/changeAccess'); ?>",
                type: 'post',
                data: {
                    kelasId: kelasId,
                    matpelId: matpelId
                },
                success: function() {
                    document.location.href = "<?= base_url('Relasi/relasiAccess/'); ?>" + kelasId;
                }
            })

        });
    </script>
    <script>
        $('.guru').on('click', function() {
            const kelasId = $(this).data('kelas');
            const guruId = $(this).data('guru');

            $.ajax({
                url: "<?= base_url('Mapel/changeAccess'); ?>",
                type: 'post',
                data: {
                    kelasId: kelasId,
                    guruId: guruId
                },
                success: function() {
                    document.location.href = "<?= base_url('Mapel/relasiGuru/'); ?>" + kelasId;
                }
            })

        });
    </script>
    <script>
        $('.kelas').on('click', function() {
            const kelasId = $(this).data('kelas');
            const guruId = $(this).data('guru');

            $.ajax({
                url: "<?= base_url('Relasi/changeAccess1'); ?>",
                type: 'post',
                data: {
                    kelasId: kelasId,
                    guruId: guruId
                },
                success: function() {
                    document.location.href = "<?= base_url('Relasi/relasi_guru/'); ?>" + kelasId;
                }
            })

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $("#paket").select2({
            placeholder: "Silahkan Pilih",
            width: "100%"
        });
    });
</script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#paket").select2({
            placeholder: "Silahkan Pilih",
            width: "100%"
            });

			//GET UPDATE
			$('.update-record').on('click',function(){
				var id_kelas = $(this).data('id_kelas');
				var nama_kelas = $(this).data('nama_kelas');
				$(".strings").val('');
				$('#UpdateModal').modal('show');
				$('[name="edit_id"]').val(id_kelas);
				$('[name="matpel_id"]').val(nama_kelas);
                //AJAX REQUEST TO GET SELECTED PRODUCT
                $.ajax({
                    url: "<?php echo site_url('relasi/get_product_by_package');?>",
                    method: "POST",
                    data :{id_kelas:id_kelas},
                    cache:false,
                    success : function(data){
                        var item=data;
                        var val1=item.replace("[","");
                        var val2=val1.replace("]","");
                        var values=val2;
                        $.each(values.split(","), function(i,e){
                            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                            $(".strings").selectpicker('refresh');

                        });
                    }
                    
                });
                return false;
			});

			//GET CONFIRM DELETE
			$('.delete-record').on('click',function(){
				var package_id = $(this).data('package_id');
				$('#DeleteModal').modal('show');
				$('[name="delete_id"]').val(package_id);
			});

		});
	</script>
</body>

</html>