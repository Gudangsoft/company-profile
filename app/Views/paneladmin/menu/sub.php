<?php 
$get= $menu;
?>
<div class="modal fade" id="modsub" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title"><b>Sub Menu (<?php echo $get->nama_menu; ?>)</b></h5>
            <div class="float-right">
               <a href="javascript:void(0)" onclick="tambahsub()" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Sub Menu</a>
            </div>
         </div>
         <div class="modal-body">
            <div id="kelola"></div>
            <div class="table-responsive">
               <table class="table table-bordered table-hover" width="100%" cellspacing="0" style="color: #000;">
                  <thead>
                     <th width="5%">No</th>
                     <th>Menu</th>
                     <th>Url</th>
                     <th>Target</th>
                     <th>Urutan</th>
                     <th width="15%">Aksi</th>
                  </thead>
                  <tbody id="submenu">
                  </tbody>
               </table>
            </div>
         </div>
         <div class="modal-footer">
            <a href="javascript:void(0)" class="btn btn-dark" data-dismiss="modal">Tutup</a>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(function(){
      loadsubmenu();
   })
   function tambahsub(){
      $.ajax({
         type : "GET",
         url : "<?php echo base_url('menu/tambahsubmenu/'.$get->id_menu) ?>",
         cache : false,
         success : function(html){
            $("#kelola").html(html).show();
         }
      });
   }
   function loadsubmenu(){
      $.ajax({
         type : "GET",
         url : "<?php echo base_url('menu/loadsubmenu/'.$get->id_menu) ?>",
         cache : false,
         beforeSend : function(){
            $("#submenu").html('<tr><td colspan="6">Loading...</td></tr>').show();
         },
         success : function(html){
            $("#submenu").html(html).show();
         }
      });
   }
</script>