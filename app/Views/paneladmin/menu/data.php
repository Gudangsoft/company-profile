
<div class="card">
   <div class="card-header">
      <h6 class="card-title"><i class="fas fa-list"></i> Data Menu Utama
      <div class="float-right">
         <a href="javascript:void(0)" onclick="tambah()" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Menu Utama</a>
      </div>
      </h6>
   </div>
   <div class="card-body">
     	<div class="table-responsive">
			<table class="table table-bordered table-hover" id="datatable" width="100%" cellspacing="0" style="color: #000;">
				<thead>
					<th width="5%">No</th>
					<th>Menu</th>
					<th>Url</th>
					<th>Target</th>
					<th>Urutan</th>
					<th width="15%">Aksi</th> 
				</thead>
				<tbody>
					<?php $no=1; foreach($menu->getresult() as $r){ ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r->nama_menu; ?></td>
						<td><?php echo $r->url_menu; ?></td>
						<td><?php echo $r->target_menu; ?></td>
						<td><?php echo $r->urutan_menu; ?></td>
						<td>
							<a href="javascript:void(0)" onclick="sub('<?php echo $r->id_menu; ?>')" class="btn btn-info btn-xs"><i class="fas fa-stream"></i> Sub</a>
							<a href="javascript:void(0)" onclick="edit('<?php echo $r->id_menu; ?>')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
							<a href="javascript:void(0)" onclick="hapus('<?php echo $r->id_menu; ?>','<?php echo $r->nama_menu; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div id="tambah"></div>
<div id="edit"></div>
<div id="sub"></div>
<script>
	function	tambah(){
		$.ajax({
			type : "GET",
			url : "<?php echo base_url('paneladmin/tambahmenu') ?>",
			success : function(html){
				$("#tambah").html(html).show();
				$('#modtambah').modal('show');
			}
		});
	}
	function	edit(id){
		$.ajax({
			type : "GET",
			url : "<?php echo base_url('paneladmin/editmenu') ?>/"+id,
			success : function(html){
				$("#edit").html(html).show();
				$('#modedit').modal('show');
			}
		});
	}
	function hapus(id,isi){
		swal({title:"",text:"Anda Yakin Untuk Menghapus Menu ("+isi+")?",type:"warning",showCancelButton:!0,confirmButtonClass:"btn-danger",cancelButtonClass:"btn-dark",confirmButtonText:"Lanjutkan",cancelButtonText:"Batal",closeOnConfirm:!1,showLoaderOnConfirm:!0,},
		function(){
			$.ajax({
				type : "GET",
				url : "<?php echo base_url('menu/hapus') ?>/"+id,
				cache : false,
				async : false,
				success : function(response){
					document.location.reload();
				}
			});
		})
	}
	function	sub(id){
		$.ajax({
			type : "GET",
			url : "<?php echo base_url('paneladmin/submenu') ?>/"+id,
			success : function(html){
				$("#sub").html(html).show();
				$('#modsub').modal('show');
			}
		});
	}
</script>
<?php if(session()->getflashdata('msg')=='simpan'){ ?>
<script>
	iziToast.show({timeout:5000,color:'green',title: 'Berhasil Disimpan',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(session()->getflashdata('msg')=='edit'){ ?>
<script>
	iziToast.show({timeout:5000,color:'blue',title: 'Berhasil Diedit',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(session()->getflashdata('msg')=='hapus'){ ?>
<script>
	iziToast.show({timeout:5000,color:'red',title: 'Berhasil Dihapus',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
