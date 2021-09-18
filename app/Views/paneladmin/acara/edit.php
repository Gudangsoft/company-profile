<?php
$r= $acara;
?>
<div class="card card-primary">
   <div class="card-header">
      <h6 class="card-title"><i class="fas fa-newspaper"></i> Edit Acara
      <div class="float-right">
         <a href="<?php echo base_url('paneladmin/acara') ?>" class="btn btn-xs btn-light"><i class="fa fa-arrow-left"></i> Data Acara</a>
      </div>
      </h6>
   </div>
	<form method="post" action="<?php echo base_url('acara/edit') ?>" enctype="multipart/form-data">
	
	<input type="hidden" name="fotolama" value="<?php echo $r->foto_acara; ?>">
	<input type="hidden" class="form-control" name="id_acara" value="<?php echo $r->id_acara; ?>">
   <div class="card-body">
   	<div class="row">
         <div class="col-lg-8 col-md-8">
            <div class="form-group">
               <label>Judul Acara</label>
               <input type="text" class="form-control" name="judul_acara" value="<?php echo $r->judul_acara; ?>">
            </div>
            <div class="form-group">
               <label>Isi Acara</label>
               <textarea name="isi_acara" id="editor"><?php echo $r->isi_acara; ?></textarea>
            </div>
         </div>
         <div class="col-lg-4 col-md-4">
            <?php if(file_exists(foto('200','acara',$r->foto_acara))){ ?>
               <a href="javascript:;" onclick="openimage('<?php echo base_url($r->foto_acara) ?>','<?php echo $r->judul_acara; ?>')"><img src="<?php echo base_url(foto('200','acara',$r->foto_acara)) ?>" class="img-thumbnail" style="margin-bottom: 10px;"></a>
            <?php } ?>
            <div class="form-group">
               <label for="">Foto Acara</label>
               <input type="file" name="foto_acara" class="form-control">
            </div>
            <div class="form-group">
               <label>Tempat Acara</label>
               <textarea name="tempat_acara" class="form-control"><?php echo $r->tempat_acara; ?></textarea>
            </div>
            <div class="form-group">
               <label for="">Tanggal Acara</label>
               <div class="input-group">
                  <input type="text" class="form-control" name="tgl_acara" placeholder="mm/dd/yyyy" data-provide="datepicker" data-date-autoclose="true" value="<?php echo mdy($r->tgl_acara); ?>" autocomplete="off" required="">
                  <div class="input-group-append">
                     <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label>Jam Mulai (contoh 14:45)</label>
               <input type="text" class="form-control" name="mulai_acara" value="<?php echo jam($r->mulai_acara); ?>">
            </div>
            <div class="form-group">
               <label>Jam Selesai (contoh 14:45)</label>
               <input type="text" class="form-control" name="selesai_acara" value="<?php echo jam($r->selesai_acara); ?>">
            </div>
         </div>
   	</div>
   </div>
   <div class="card-footer">
      <button class="btn btn-primary" onclick="return confirm('Lanjutkan Edit Acara?');"><i class="fa fa-check"></i> Edit Acara</button>
      <a href="<?php echo base_url('paneladmin/acara') ?>" class="btn btn-dark">Kembali</a>
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
	iziToast.show({timeout:5000,color:'green',title: 'Acara Berhasil Diedit',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(session()->getflashdata('msg')=='gagal'){ ?>
	<script>
	iziToast.show({timeout:5000,color:'red',title: 'Gagal Diedit',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
