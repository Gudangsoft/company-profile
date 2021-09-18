<div class="modal fade" id="modtambah" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Tambah Galeri </b></h5>
      	</div>
			<form action="<?php echo base_url('galeri/tambah') ?>" method="post" enctype="multipart/form-data">
			
      	<div class="modal-body">
      		<div class="form-group">
					<label for="">Keterangan</label>
					<textarea class="form-control" name="ket_galeri" id="" rows="3"></textarea>
				</div>
				<div class="form-group">
               <label for="">Foto Galeri</label>
               <input type="file" name="foto_galeri" class="form-control">
            </div>
      	</div>
      	<div class="modal-footer">
      		<button class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
      		<a href="javascript:void(0)" class="btn btn-dark" data-dismiss="modal">Tutup</a>
      	</div>
      	</form>
      </div>
   </div>
</div>