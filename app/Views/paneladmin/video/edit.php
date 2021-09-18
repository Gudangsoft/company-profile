<div class="modal fade" id="modedit" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Edit Video </b></h5>
      	</div>
			<form action="<?php echo base_url('video/edit') ?>" method="post" enctype="multipart/form-data">
			
         <input type="hidden" name="id_video" id="" class="form-control" value="<?php echo $video->id_video; ?>">
      	<div class="modal-body">
      		<div class="form-group">
      			<label for="">Link Youtube</label>
               <input type="text" name="youtube_video" id="" class="form-control" value="<?php echo $video->youtube_video; ?>">
      		</div>
            <div class="form-group">
               <label>Keterangan video</label>
					<textarea class="form-control" name="ket_video" id="" rows="3"><?php echo $video->ket_video; ?></textarea>
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