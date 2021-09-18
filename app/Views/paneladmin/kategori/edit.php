<div class="modal fade" id="modedit" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Edit Kategori </b></h5>
      	</div>
			<form action="<?php echo base_url('kategori/edit') ?>" method="post" enctype="multipart/form-data">
			
         <input type="hidden" name="id_kategori" id="" class="form-control" value="<?php echo $kategori->id_kategori; ?>">
      	<div class="modal-body">
      		<div class="form-group">
      			<label for="">Nama Kategori</label>
               <input type="text" name="nama_kategori" id="" class="form-control" value="<?php echo $kategori->nama_kategori; ?>">
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