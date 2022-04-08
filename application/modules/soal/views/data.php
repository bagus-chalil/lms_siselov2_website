<div class="box">
    <div class="box-header with-border">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
		<div class="row">
        	<div class="col-sm-4">
				<button type="button" onclick="bulk_delete()" class="btn btn-flat btn-sm bg-red"><i class="fa fa-trash"></i> Bulk Delete</button>
			</div>
			<div class="form-group col-sm-4 text-center">
      <?php if ($user['role_id'] == 1) { ?>
        <select id="matkul_filter" class="form-control select2" width="100%">
          <option value="all">Semua Matkul</option>
          <?php foreach ($matpel as $m) :?>
            <option value="<?=$m->id_matpel?>"><?=$m->nama_matpel?></option>
          <?php endforeach; ?>
        </select>
      <?php }else if ($user['role_id'] == 2) { ?> 			
        <input id="matpel_id" value="<?=$matpel->nama_matpel;?>" type="text" readonly class="form-control" width="100px">
        <?php }else { ?>
            <?php } ?>
			</div>
			<div class="col-sm-4">
				<div class="pull-right">
					<a href="<?=base_url('soal/add')?>" class="btn bg-purple btn-flat btn-sm"><i class="fa fa-plus"></i> Buat Soal</a>
					<button type="button" onclick="reload_ajax()" class="btn btn-flat btn-sm bg-maroon"><i class="fa fa-refresh"></i> Reload</button>
				</div>
			</div>
		</div>
    </div>
	<?=form_open('soal/delete', array('id'=>'bulk'))?>
    <div class="table-responsive px-4 pb-3" style="border: 0">
        <table id="soal" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
				<th class="text-center">
					<input type="checkbox" class="select_all">
				</th>
                <th width="25">No.</th>
				<th>Guru</th>
                <th>Matapelajaran</th>
				<th>Soal</th>
				<th>Tgl Dibuat</th>
				<th class="text-center">Aksi</th>
            </tr>        
        </thead>
        <tfoot>
            <tr>
				<th class="text-center">
					<input type="checkbox" class="select_all">
				</th>
                <th width="25">No.</th>
				<th>Guru</th>
                <th>Matapelajaran</th>
				<th>Soal</th>
				<th>Tgl Dibuat</th>
				<th class="text-center">Aksi</th>
            </tr>
        </tfoot>
        </table>
    </div>
	<?=form_close();?>
</div>
      
      <script src="<?=base_url()?>assets/js/app/soal/data.js"></script>

      <?php if ( $user['role_id'] == 1 ) : ?>
      <script type="text/javascript">
      $(document).ready(function(){
        $('#matkul_filter').on('change', function(){
          let id_matpel = $(this).val();
          let src = '<?=base_url()?>soal/data';
          let url;

          if(id_matpel !== 'all'){
            let src2 = src + '/' + id_matpel;
            url = $(this).prop('checked') === true ? src : src2;
          }else{
            url = src;
          }
          table.ajax.url(url).load();
        });
      });
      </script>
      <?php endif; ?>
      <?php if ( $user['role_id'] == 2 ) : ?>
      <script type="text/javascript">
      $(document).ready(function(){
        let id_matpel = '<?=$matpel->matpel_id?>';
        let id_guru = '<?=$matpel->id_guru?>';
        let src = '<?=base_url()?>soal/data';
        let url = src + '/' + id_matpel + '/' + id_guru;

        table.ajax.url(url).load();
      });
      </script>
      <?php endif; ?>

    