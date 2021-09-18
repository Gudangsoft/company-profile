<?php
$r= $artikel;
?>
<div class="card card-primary">
   <div class="card-header">
      <h6 class="card-title"><i class="fas fa-newspaper"></i> Edit Artikel
      <div class="float-right">
         <a href="<?php echo base_url('paneladmin/artikel') ?>" class="btn btn-xs btn-light"><i class="fa fa-arrow-left"></i> Data Artikel</a>
      </div>
      </h6>
   </div>
	<form method="post" action="<?php echo base_url('artikel/edit') ?>" enctype="multipart/form-data">
	
	<input type="hidden" name="fotolama" value="<?php echo $r->foto_artikel; ?>">
	<input type="hidden" class="form-control" name="id_artikel" value="<?php echo $r->id_artikel; ?>">
   <div class="card-body">
   	<div class="row">
         <div class="col-lg-8 col-md-8">
            <div class="form-group">
               <label>Judul Artikel</label>
               <input type="text" class="form-control" name="judul_artikel" value="<?php echo $r->judul_artikel; ?>">
            </div>
            <div class="form-group">
               <label>Isi Artikel</label>
               <textarea name="isi_artikel" id="editor"><?php echo $r->isi_artikel; ?></textarea>
            </div>
         </div>
         <div class="col-lg-4 col-md-4">
				<?php if(file_exists(folder('200','artikel',$r->foto_artikel))){ ?>
               <a href="javascript:;" onclick="openimage('<?php echo base_url($r->foto_artikel) ?>','<?php echo $r->judul_artikel; ?>')"><img src="<?php echo base_url(folder('200','artikel',$r->foto_artikel)) ?>" class="img-thumbnail" style="margin-bottom: 10px;"></a>
            <?php } ?>
            <div class="form-group">
               <label for="">Foto Artikel</label>
               <input type="file" name="foto_artikel" class="form-control">
            </div>
            <div class="form-group">
               <label for="">Pilih Kategori</label>
               <select class="form-control select2" name="id_kategori_artikel">
                  <option value="">-Pilih-</option>
                  <?php foreach($kategori->getresult() as $de){
							if($de->id_kategori==$r->id_kategori_artikel){ $seld= 'selected'; }else{ $seld= ''; }
                     echo '<option '.$seld.' value="'.$de->id_kategori.'">'.$de->nama_kategori.'</option>';
                  } ?>
               </select>
            </div>
            <div class="form-group">
					<label>Tampilkan Di Website</label>
					<select class="form-control" name="spam_artikel" id="">
						<option <?php if($r->spam_artikel=='0'){ echo 'selected'; } ?> value="0">YA Tampilkan</option>
						<option <?php if($r->spam_artikel=='1'){ echo 'selected'; } ?> value="1">TIDAK Tampilkan</option>
					</select>
				</div>
            <div class="form-group">
					<label>Tag</label>
					<div class="tags-default">
						<input type="text" class="form-control" name="tag_artikel" value="<?php echo $r->tag_artikel; ?>" data-role="tagsinput" placeholder="Tambah">
					</div>
            </div>
         </div>
   	</div>
   </div>
   <div class="card-footer">
      <button class="btn btn-primary" onclick="return confirm('Lanjutkan Edit Artikel?');"><i class="fa fa-check"></i> Edit Artikel</button>
      <a href="<?php echo base_url('paneladmin/artikel') ?>" class="btn btn-dark">Kembali</a>
   </div>
   </form>
</div>
<script type="text/javascript">
   $(function () {
      CKEDITOR.replace('editor',{
         height: 300,
      });
   });
</script>
<?php if(session()->getflashdata('msg')=='edit'){ ?>
	<script>
	iziToast.show({timeout:5000,color:'green',title: 'Artikel Berhasil Diedit',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(session()->getflashdata('msg')=='gagal'){ ?>
	<script>
	iziToast.show({timeout:5000,color:'red',title: 'Gagal Diedit',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
