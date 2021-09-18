<div class="modal fade" id="modtambah" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Tambah Video </b></h5>
      	</div>
			<form action="<?php echo base_url('video/tambah') ?>" method="post" enctype="multipart/form-data">
			
      	<div class="modal-body">
      		<div class="form-group">
      			<label for="">Link Youtube</label>
               <input type="text" name="youtube_video" id="" class="form-control">
      		</div>
            <div class="form-group">
               <label>Keterangan video</label>
					<textarea class="form-control" name="ket_video" id="" rows="3"></textarea>
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