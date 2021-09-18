
<div class="card">
   <div class="card-header">
      <h6 class="card-title"><i class="fas fa-image"></i> Data Galeri
      <div class="float-right">
         <a href="javascript:void(0)" onclick="tambah()" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Galeri</a>
      </div>
      </h6>
   </div>
   <div class="card-body">
     	<div class="table-responsive">
			<table class="table table-bordered table-hover" id="datatable" width="100%" cellspacing="0" style="color: #000;">
				<thead>
					<th width="5%">No</th>
					<th width="10%">Gambar</th>
					<th>Keterangan</th>
					<th width="15%">Aksi</th>
				</thead>
				<tbody>
					<?php $no=1; foreach($galeri->getresult() as $r){ ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><a href="javascript:;" onclick="openimage('<?php echo base_url($r->foto_galeri) ?>','<?php echo $r->ket_galeri; ?>')"><img src="<?php echo base_url(foto('300','galeri',$r->foto_galeri)) ?>" class="img-rounded" width="50px"></a></td>
						<td><?php echo $r->ket_galeri; ?></td>
						<td>
							<a href="javascript:void(0)" onclick="edit('<?php echo $r->id_galeri; ?>')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
							<a href="javascript:void(0)" onclick="hapus('<?php echo $r->id_galeri; ?>','<?php echo $r->id_galeri; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
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
<script>
	function	tambah(){
		$.ajax({
			type : "GET",
			url : "<?php echo base_url('paneladmin/tambahgaleri') ?>",
			cache : false,
			async : false,
			success : function(html){
				$("#tambah").html(html).show();
				$('#modtambah').modal('show');
			}
		});
	}
	function	edit(id){
		$.ajax({
			type : "GET",
			url : "<?php echo base_url('paneladmin/editgaleri') ?>/"+id,
			cache : false,
			async : false,
			success : function(html){
				$("#edit").html(html).show();
				$('#modedit').modal('show');
			}
		});
	}
	function hapus(id,isi){
		swal({title:"",text:"Anda Yakin Untuk Menghapus Galeri ("+isi+")?",type:"warning",showCancelButton:!0,confirmButtonClass:"btn-danger",cancelButtonClass:"btn-dark",confirmButtonText:"Lanjutkan",cancelButtonText:"Batal",closeOnConfirm:!1,showLoaderOnConfirm:!0,},
		function(){
			$.ajax({
				type : "GET",
				url : "<?php echo base_url('galeri/hapus') ?>/"+id,
				cache : false,
				async : false,
				success : function(response){
					document.location.reload();
				}
			});
		})
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
<?php if(session()->getflashdata('msg')=='gagal'){ ?>
	<script>
	iziToast.show({timeout:5000,color:'red',title: 'Gagal Disimpan',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>

