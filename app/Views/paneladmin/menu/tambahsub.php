<?php 
$get= $menu;
?>
            <form id="formtambah">
               
               <input type="hidden" name="parentid_menu" value="<?php echo $get->id_menu; ?>">
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
               <button onclick="tambahsubmenu()" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
               <a href="javascript:void(0)" onclick="tutuptambah()" class="btn btn-dark">Tutup</a>
            </form>
            <hr>
<script type="text/javascript">
   function tambahsubmenu(){
      $.ajax({
         type : "POST",
         url : "<?php echo base_url('menu/addsub') ?>",
         data : $('#formtambah').serialize(),
         cache : false,
         success : function(response){
            tutuptambah();
            loadsubmenu();
         }
      });
   }
   function tutuptambah(){
      $('#kelola').html('').show();
   }
</script>