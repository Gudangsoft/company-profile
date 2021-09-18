<div class="modal fade" id="modedit" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Edit Ourservice </b></h5>
      	</div>
			<form action="<?php echo base_url('ourservice/edit') ?>" method="post" enctype="multipart/form-data">
			
			<input type="hidden" name="fotolama" value="<?php echo $ourservice->foto_ourservice; ?>">
         <input type="hidden" name="id_ourservice" id="" class="form-control" value="<?php echo $ourservice->id_ourservice; ?>">
      	<div class="modal-body">
      		<div class="form-group">
					<label for="">Judul</label>
               <input type="text" name="judul_ourservice" class="form-control" value="<?php echo $ourservice->judul_ourservice; ?>">
				</div>
      		<div class="form-group">
					<label for="">Isi</label>
					<textarea class="form-control" name="isi_ourservice" id=""><?php echo $ourservice->isi_ourservice; ?></textarea>
				</div>
				<div class="form-group">
					<label for="">Link</label>
               <input type="text" name="link_ourservice" class="form-control" value="<?php echo $ourservice->link_ourservice; ?>">
				</div>
				<div class="form-group">
					<label for="">Urutan</label>
               <input type="number" name="urutan_ourservice" class="form-control" value="<?php echo $ourservice->urutan_ourservice; ?>">
				</div>
				<?php if(file_exists(foto('200','ourservice',$ourservice->foto_ourservice))){ ?>
               <img src="<?php echo base_url(foto('200','ourservice',$ourservice->foto_ourservice)) ?>" class="img-thumbnail" style="margin-bottom: 10px;">
            <?php } ?>
				<div class="form-group">
               <label for="">Foto Ourservice</label>
               <input type="file" name="foto_ourservice" class="form-control">
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