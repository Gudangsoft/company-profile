
<div class="card">
   <div class="card-header">
      <h6 class="card-title"><i class="fas fa-sliders-h"></i> Data Slider
      <div class="float-right">
         <a href="javascript:void(0)" onclick="tambah()" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Slider</a>
      </div>
      </h6>
   </div>
   <div class="card-body">
     	<div class="table-responsive">
			<table class="table table-bordered table-hover" id="datatable" width="100%" cellspacing="0" style="color: #000;">
				<thead>
					<th width="5%">No</th>
					<th width="10%">Gambar</th>
					<th>Judul</th>
					<th>Isi</th>
					<th>Link</th>
					<th>Urutan</th>
					<th width="10%">Aksi</th>
				</thead>
				<tbody>
					<?php $no=1; foreach($slider->getresult() as $r){ ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><a href="javascript:;" onclick="openimage('<?php echo base_url($r->foto_slider) ?>','<?php echo $r->judul_slider; ?>')"><img src="<?php echo base_url(foto('200','slider',$r->foto_slider)) ?>" class="img-rounded" width="50px"></a></td>
						<td><?php echo $r->judul_slider; ?></td>
						<td><?php echo $r->isi_slider; ?></td>
						<td><?php echo $r->link_slider; ?></td>
						<td><?php echo $r->urutan_slider; ?></td>
						<td>
							<a href="javascript:void(0)" onclick="edit('<?php echo $r->id_slider; ?>')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
							<a href="javascript:void(0)" onclick="hapus('<?php echo $r->id_slider; ?>','<?php echo $r->id_slider; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
			url : "<?php echo base_url('paneladmin/tambahslider') ?>",
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
			url : "<?php echo base_url('paneladmin/editslider') ?>/"+id,
			cache : false,
			async : false,
			success : function(html){
				$("#edit").html(html).show();
				$('#modedit').modal('show');
			}
		});
	}
	function hapus(id,isi){
		swal({title:"",text:"Anda Yakin Untuk Menghapus Slider ("+isi+")?",type:"warning",showCancelButton:!0,confirmButtonClass:"btn-danger",cancelButtonClass:"btn-dark",confirmButtonText:"Lanjutkan",cancelButtonText:"Batal",closeOnConfirm:!1,showLoaderOnConfirm:!0,},
		function(){
			$.ajax({
				type : "GET",
				url : "<?php echo base_url('slider/hapus') ?>/"+id,
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

