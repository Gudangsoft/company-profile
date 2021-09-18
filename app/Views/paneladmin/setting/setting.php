
<?php 
$r= $aplikasi->getrow();
?>
<div class="row">
   <div class="col-lg-6">
      <div class="card-box">
         <h4 class="header-title mb-4"><i class="fa fa-cog"></i> Pengaturan Aplikasi</h4>
            <ul class="nav nav-tabs">
               <li class="nav-item">
                   <a href="#umum" data-toggle="tab" aria-expanded="false" class="nav-link active">
                       <span class="">Umum</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="#sosmed" data-toggle="tab" aria-expanded="true" class="nav-link">
                       <span class="">Link Sosmed</span>
                   </a>
               </li>
               <li class="nav-item">
                  <a href="#email" data-toggle="tab" aria-expanded="true" class="nav-link">
                      <span class="">Email Notif</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="#map" data-toggle="tab" aria-expanded="true" class="nav-link">
                      <span class="">Maps</span>
                  </a>
               </li>
            </ul>
			<form method="post" action="<?php echo base_url('setting/simpan') ?>" enctype="multipart/form-data">
			
         <input type="hidden" name="logolama" value="<?php echo $r->logo_app ?>">
         <input type="hidden" name="iconlama" value="<?php echo $r->icon_app ?>">
         <div class="tab-content">
            <div class="tab-pane active" id="umum">
               <div class="form-group">
      				<label>Nama Aplikasi</label>
      				<input type="text" name="nama_app" class="form-control" required="" value="<?php echo $r->nama_app ?>">
               </div>
               <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="deskripsi_app"><?php echo $r->deskripsi_app ?></textarea>
               </div>
               <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp_app" value="<?php echo $r->nohp_app ?>">
               </div>
               <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email_app" value="<?php echo $r->email_app ?>">
               </div>
               <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea name="alamat_app" class="form-control"><?php echo $r->alamat_app ?></textarea>
               </div>
               <div class="form-group">
                  <p class="text-primary">Logo Saat Ini : <a href="javascript:;" onclick="openimage('<?php echo base_url($r->logo_app) ?>')"><i class="fa fa-eye"></i> Lihat Logo</a></p>
      				<label>Logo</label>
      				<input type="file" class="form-control" name="logo_app">
               </div>
               <div class="form-group">
                  <label>Lebar Logo *px</label>
                  <input type="text" class="form-control" name="widthlogo_app" value="<?php echo $r->widthlogo_app ?>">
               </div>
               <div class="form-group">
                  <label>Tinggi Logo *px</label>
                  <input type="text" class="form-control" name="heightlogo_app" value="<?php echo $r->heightlogo_app ?>">
               </div>
               <div class="form-group">
                  <p class="text-primary">Icon Saat Ini : <a href="javascript:;" onclick="openimage('<?php echo base_url($r->icon_app) ?>')"><i class="fa fa-eye"></i> Lihat Icon</a></p>
                  <label>Icon</label>
                  <input type="file" class="form-control" name="icon_app">
               </div>
            </div>
            <div class="tab-pane" id="sosmed">
               <div class="form-group">
                  <label>Facebook</label>
                  <input type="text" class="form-control" name="fb_app" value="<?php echo $r->fb_app ?>">
               </div>
               <div class="form-group">
                  <label>Instagram</label>
                  <input type="text" class="form-control" name="ig_app" value="<?php echo $r->ig_app ?>">
               </div>
               <div class="form-group">
                  <label>Youtube</label>
                  <input type="text" class="form-control" name="yt_app" value="<?php echo $r->yt_app ?>">
               </div>
               <div class="form-group">
                  <label>Twitter</label>
                  <input type="text" class="form-control" name="tw_app" value="<?php echo $r->tw_app ?>">
               </div>
            </div>
            <div class="tab-pane" id="email">
               <div class="form-group">
                  <label>Atas Nama Email</label>
                  <input type="text" class="form-control" name="atasnamaemail_app" value="<?php echo $r->atasnamaemail_app ?>">
               </div>
               <div class="form-group">
                  <label>Alamat Email</label>
                  <input type="text" class="form-control" name="alamatemail_app" value="<?php echo $r->alamatemail_app ?>">
               </div>
               <div class="form-group">
                  <label>Protocol</label>
                  <input type="text" class="form-control" name="protocol_app" value="<?php echo $r->protocol_app ?>">
               </div>
               <div class="form-group">
                  <label>SMTP Host</label>
                  <input type="text" class="form-control" name="smtphost_app" value="<?php echo $r->smtphost_app ?>">
               </div>
               <div class="form-group">
                  <label>SMTP User</label>
                  <input type="text" class="form-control" name="smtpuser_app" value="<?php echo $r->smtpuser_app ?>">
               </div>
               <div class="form-group">
                  <label>SMTP Pass</label>
                  <input type="text" class="form-control" name="smtppass_app" value="<?php echo $r->smtppass_app ?>">
               </div>
               <div class="form-group">
                  <label>SMTP Port</label>
                  <input type="text" class="form-control" name="smtpport_app" value="<?php echo $r->smtpport_app ?>">
               </div>
            </div>
            <div class="tab-pane" id="map">
               <div class="form-group">
                  <label for="">Link Gmaps</label>
                  <textarea name="gmap_app" class="form-control" rows="5"><?php echo $r->gmap_app ?></textarea>
               </div>
               <hr>
               <iframe src="<?php echo $r->gmap_app ?>" height="300" width="100%" frameborder="0" allowfullscreen></iframe>
               <hr>
            </div>
         </div>
         <button class="btn btn-primary"><i class="fa fa-check"></i> Simpan Pengaturan</button>
         </form>
      </div>
   </div>
   <div class="col-lg-6">
      <div class="card card-default">
         <div class="card-header">
            <h6 class="card-title"><i class="fas fa-envelope-open"></i> Testing Email</h6>
         </div>
         <form target="_blank" method="post" action="<?php echo base_url('setting/sendemail') ?>">
         
         <div class="card-body">
            <div class="form-group">
               <label>Masukkan Email Tujuan</label>
               <input type="text" name="emailtujuan" class="form-control">
            </div>
            <div class="form-group">
               <label>Text Pesan</label>
               <textarea class="form-control" name="pesan"></textarea>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary"><i class="fa fa-check"></i> Kirim Email</button>
         </div>
         </form>
      </div>
   </div>
</div>
<?php if(session()->getflashdata('msg')=='edit'){ ?>
<script>
   iziToast.show({timeout:5000,color:'blue',title: 'Berhasil Diedit',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>
<?php if(session()->getflashdata('msg')=='format'){ ?>
<script>
   iziToast.show({timeout:5000,color:'red',title: 'Periksa Inputan Anda',position: 'topRight',pauseOnHover: true,transitionIn: false});
</script>
<?php } ?>

