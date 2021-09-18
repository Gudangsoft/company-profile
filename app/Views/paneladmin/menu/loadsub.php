<?php $no=1; foreach($submenu->getresult() as $r){ ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $r->nama_menu; ?></td>
		<td><?php echo $r->url_menu; ?></td>
		<td><?php echo $r->target_menu; ?></td>
		<td><?php echo $r->urutan_menu; ?></td>
		<td>
			<a href="javascript:void(0)" onclick="editsub('<?php echo $r->id_menu; ?>')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
			<a href="javascript:void(0)" onclick="hapussub('<?php echo $r->id_menu; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php $no++; } ?>
<script type="text/javascript">
	function editsub(id){
      $.ajax({
         type : "GET",
         url : "<?php echo base_url('menu/editsubmenu') ?>/"+id,
         success : function(html){
            $("#kelola").html(html).show();
         }
      });
   }
   function hapussub(id){
		var conf= confirm('Hapus Sub Menu?');
		if(conf==true){
			$.ajax({
				type : "GET",
				url : "<?php echo base_url('menu/hapus') ?>/"+id,
				success : function(response){
            	loadsubmenu();
      			$('#kelola').html('').show();
				}
			});
		}
	}
</script>