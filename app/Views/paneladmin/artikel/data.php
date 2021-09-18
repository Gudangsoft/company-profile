<div class="card">
   <div class="card-header">
      <h6 class="card-title"><i class="fas fa-newspaper"></i> Data Artikel
      <div class="float-right">
         <a href="<?php echo base_url('paneladmin/tambahartikel') ?>" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Artikel</a>
      </div>
      </h6>
   </div>
   <div class="card-body">
     	<div class="table-responsive">
			<table class="table table-bordered table-hover" id="datatable" width="100%" cellspacing="0" style="color: #000;">
				<thead>
					<th width="5%">No</th>
					<th>Judul</th>
					<th>Kategori</th>
					<th>Slug</th>
					<th>Dilihat</th>
					<th>Tampil</th>
					<th>Tanggal</th>
					<th width="10%">Aksi</th>
				</thead>
				<tbody>
					<?php $no=1; foreach($artikel->getresult() as $r){ ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r->judul_artikel; ?></td>
						<td><?php echo $r->nama_kategori; ?></td>
						<td><?php echo base_url('baca/'.$r->slug_artikel) ?></td>
						<td><?php echo $r->dilihat_artikel; ?>x</td>
						<td><?php echo tampil($r->spam_artikel); ?></td>
						<td><?php echo dmy($r->tglinput_artikel); ?></td>
						<td>
							<a title="Lihat" target="_blank" href="<?php echo base_url('baca/'.$r->slug_artikel) ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
							<a title="Edit" href="<?php echo base_url('paneladmin/editartikel/'.$r->id_artikel) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
							<a title="Hapus" href="javascript:void(0)" onclick="hapus('<?php echo $r->id_artikel; ?>','<?php echo $r->judul_artikel; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function hapus(id,isi){
		swal({title:"",text:"Anda Yakin Untuk Menghapus Artikel ("+isi+")?",type:"warning",showCancelButton:!0,confirmButtonClass:"btn-danger",cancelButtonClass:"btn-dark",confirmButtonText:"Lanjutkan",cancelButtonText:"Batal",closeOnConfirm:!1,showLoaderOnConfirm:!0,},
		function(){
			$.ajax({
				type : "GET",
				url : "<?php echo base_url('artikel/hapus') ?>/"+id,
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

