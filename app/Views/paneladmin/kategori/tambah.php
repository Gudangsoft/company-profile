<div class="modal fade" id="modtambah" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Tambah Kategori </b></h5>
      	</div>
			<form action="<?php echo base_url('kategori/tambah') ?>" method="post" enctype="multipart/form-data">
			
      	<div class="modal-body">
      		<div class="form-group">
      			<label for="">Nama Kategori</label>
               <input type="text" name="nama_kategori" id="" class="form-control">
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