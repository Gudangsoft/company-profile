<?php 
$r= $menu;
?>
            <form id="formedit">
               
               <input type="hidden" name="id_menu" value="<?php echo $r->id_menu; ?>">
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
               <button onclick="editsubmenu()" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
               <a href="javascript:void(0)" onclick="tutupedit()" class="btn btn-dark">Tutup</a>
            </form>
            <hr>
<script type="text/javascript">
   function editsubmenu(){
      $.ajax({
         type : "POST",
         url : "<?php echo base_url('menu/updatesub') ?>",
         data : $('#formedit').serialize(),
         cache : false,
         success : function(response){
            tutupedit();
            loadsubmenu();
         }
      });
   }
   function tutupedit(){
      $('#kelola').html('').show();
   }
</script>