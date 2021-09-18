<div class="modal fade" id="modedit" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Edit Halaman </b></h5>
      	</div>
			<form action="<?php echo base_url('halaman/edit') ?>" method="post" enctype="multipart/form-data">
			
         <input type="hidden" name="id_halaman" id="" class="form-control" value="<?php echo $halaman->id_halaman; ?>">
      	<div class="modal-body">
      		<div class="form-group">
      			<label for="">Judul Halaman</label>
               <input type="text" name="judul_halaman" id="" class="form-control" value="<?php echo $halaman->judul_halaman; ?>">
      		</div>
            <div class="form-group">
               <label>Isi Halaman</label>
               <textarea name="isi_halaman" id="editor"><?php echo $halaman->isi_halaman; ?></textarea>
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
<script type="text/javascript">
   $(function () {
      CKEDITOR.replace('editor',{
         height: 300,
      });
   });
</script>