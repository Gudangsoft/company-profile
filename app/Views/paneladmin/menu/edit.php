<?php 
$r= $menu;
?>
<div class="modal fade" id="modedit" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title"><b>Edit Menu Utama</b></h5>
         </div>
         <form action="<?php echo base_url('menu/edit') ?>" method="post" enctype="multipart/form-data">
         
         <input type="hidden" name="id_menu" value="<?php echo $r->id_menu; ?>">
         <div class="modal-body">
            <div class="form-group">
               <label for="">Nama Menu</label>
               <input type="text" name="nama_menu" id="" class="form-control" value="<?php echo $r->nama_menu; ?>">
            </div>
            <div class="form-group">
               <label>Url Menu</label>
               <input type="text" name="url_menu" id="" class="form-control" value="<?php echo $r->url_menu; ?>">
            </div>
            <div class="form-group">
               <label>Target</label>
               <select class="form-control" name="target_menu">
                  <option <?php if($r->target_menu=='_self'){ echo 'selected'; } ?>>_self</option>
                  <option <?php if($r->target_menu=='_blank'){ echo 'selected'; } ?>>_blank</option>
               </select>
            </div>
            <div class="form-group">
               <label>Urutan</label>
               <input type="number" name="urutan_menu" id="" class="form-control" value="<?php echo $r->urutan_menu; ?>">
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