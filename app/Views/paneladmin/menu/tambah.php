<div class="modal fade" id="modtambah" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
				<h5 class="modal-title"><b>Tambah Menu Utama</b></h5>
      	</div>
         <form action="<?php echo base_url('menu/tambah') ?>" method="post" enctype="multipart/form-data">
         
      	<div class="modal-body">
      		<div class="form-group">
      			<label for="">Nama Menu</label>
               <input type="text" name="nama_menu" id="" class="form-control">
      		</div>
            <div class="form-group">
               <label>Url Menu</label>
               <input type="text" name="url_menu" id="" class="form-control">
            </div>
            <div class="form-group">
               <label>Target</label>
               <select class="form-control" name="target_menu">
                  <option>_self</option>
                  <option>_blank</option>
               </select>
            </div>
            <div class="form-group">
               <label>Urutan</label>
               <input type="number" name="urutan_menu" id="" class="form-control">
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