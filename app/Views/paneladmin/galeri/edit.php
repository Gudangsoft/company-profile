<div class="modal fade" id="modedit" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Edit Galeri </b></h5>
      	</div>
			<form action="<?php echo base_url('galeri/edit') ?>" method="post" enctype="multipart/form-data">
			
			<input type="hidden" name="fotolama" value="<?php echo $galeri->foto_galeri; ?>">
         <input type="hidden" name="id_galeri" id="" class="form-control" value="<?php echo $galeri->id_galeri; ?>">
      	<div class="modal-body">
      		<div class="form-group">
					<label for="">Keterangan</label>
					<textarea class="form-control" name="ket_galeri" id="" rows="3"><?php echo $galeri->ket_galeri; ?></textarea>
				</div>
				<?php if(file_exists(foto('200','galeri',$galeri->foto_galeri))){ ?>
               <img src="<?php echo base_url(foto('200','galeri',$galeri->foto_galeri)) ?>" class="img-thumbnail" style="margin-bottom: 10px;">
            <?php } ?>
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