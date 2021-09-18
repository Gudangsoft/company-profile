<div class="modal fade" id="modtambah" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Tambah Halaman </b></h5>
      	</div>
			<form action="<?php echo base_url('halaman/tambah') ?>" method="post" enctype="multipart/form-data">
			
      	<div class="modal-body">
      		<div class="form-group">
      			<label for="">Judul Halaman</label>
               <input type="text" name="judul_halaman" id="" class="form-control">
      		</div>
            <div class="form-group">
               <label>Isi Halaman</label>
               <textarea name="isi_halaman" id="editor"></textarea>
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