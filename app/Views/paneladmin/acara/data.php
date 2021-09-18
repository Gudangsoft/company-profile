<div class="card">
   <div class="card-header">
      <h6 class="card-title"><i class="fas fa-calendar-day"></i> Data Acara
      <div class="float-right">
         <a href="<?php echo base_url('paneladmin/tambahacara') ?>" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Acara</a>
      </div>
      </h6>
   </div>
   <div class="card-body">
     	<div class="table-responsive">
			<table class="table table-bordered table-hover" id="datatable" width="100%" cellspacing="0" style="color: #000;">
				<thead>
					<th width="5%">No</th>
					<th>Judul</th>
					<th>Slug</th>
					<th>Tanggal</th>
					<th>Jam Mulai</th>
					<th>Tempat</th>
					<th width="15%">Aksi</th>
				</thead>
				<tbody>
					<?php $no=1; foreach($acara->getresult() as $r){ ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r->judul_acara; ?></td>
						<td><?php echo base_url('lihat/'.$r->slug_acara) ?></td>
						<td><?php echo dmy($r->tgl_acara); ?></td>
						<td><?php echo jam($r->mulai_acara); ?> s/d <?php echo jam($r->selesai_acara); ?></td>
						<td><?php echo $r->tempat_acara; ?></td>
						<td>
							<a title="Lihat" target="_blank" href="<?php echo base_url('lihat/'.$r->slug_acara) ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
							<a title="Edit" href="<?php echo base_url('paneladmin/editacara/'.$r->id_acara) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
							<a title="Hapus" href="javascript:void(0)" onclick="hapus('<?php echo $r->id_acara; ?>','<?php echo $r->judul_acara; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
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
		swal({title:"",text:"Anda Yakin Untuk Menghapus Acara ("+isi+")?",type:"warning",showCancelButton:!0,confirmButtonClass:"btn-danger",cancelButtonClass:"btn-dark",confirmButtonText:"Lanjutkan",cancelButtonText:"Batal",closeOnConfirm:!1,showLoaderOnConfirm:!0,},
		function(){
			$.ajax({
				type : "GET",
				url : "<?php echo base_url('acara/hapus') ?>/"+id,
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

