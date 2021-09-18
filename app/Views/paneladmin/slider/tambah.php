<div class="modal fade" id="modtambah" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Tambah Slider </b></h5>
      	</div>
			<form action="<?php echo base_url('slider/tambah') ?>" method="post" enctype="multipart/form-data">
			
      	<div class="modal-body">
				<div class="form-group">
               <label for="">Judul</label>
               <input type="text" name="judul_slider" class="form-control">
				</div>
      		<div class="form-group">
					<label for="">Isi</label>
					<textarea class="form-control" name="isi_slider" id="" rows="3"></textarea>
				</div>
				<div class="form-group">
               <label for="">Link</label>
               <input type="text" name="link_slider" class="form-control">
				</div>
				<div class="form-group">
               <label for="">Urutan</label>
               <input type="number" name="urutan_slider" class="form-control">
				</div>
				<div class="form-group">
               <label for="">Foto Slider</label>
               <input type="file" name="foto_slider" class="form-control">
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