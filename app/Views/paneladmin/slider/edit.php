<div class="modal fade" id="modedit" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Edit Slider </b></h5>
      	</div>
			<form action="<?php echo base_url('slider/edit') ?>" method="post" enctype="multipart/form-data">
			
			<input type="hidden" name="fotolama" value="<?php echo $slider->foto_slider; ?>">
         <input type="hidden" name="id_slider" id="" class="form-control" value="<?php echo $slider->id_slider; ?>">
      	<div class="modal-body">
				<div class="form-group">
               <label for="">Judul</label>
               <input type="text" name="judul_slider" class="form-control" value="<?php echo $slider->judul_slider; ?>">
				</div>
      		<div class="form-group">
					<label for="">Isi</label>
					<textarea class="form-control" name="isi_slider" id="" rows="3"><?php echo $slider->isi_slider; ?></textarea>
				</div>
				<div class="form-group">
               <label for="">Link</label>
               <input type="text" name="link_slider" class="form-control" value="<?php echo $slider->link_slider; ?>">
				</div>
				<div class="form-group">
               <label for="">Urutan</label>
               <input type="number" name="urutan_slider" class="form-control" value="<?php echo $slider->urutan_slider; ?>">
				</div>
				<?php if(file_exists(foto('200','slider',$slider->foto_slider))){ ?>
               <img src="<?php echo base_url(foto('200','slider',$slider->foto_slider)) ?>" class="img-thumbnail" style="margin-bottom: 10px;">
            <?php } ?>
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