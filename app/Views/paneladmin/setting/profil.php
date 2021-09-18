
<div class="row">
   <div class="col-lg-6">
      <div class="card card-default">
         <div class="card-header">
            <h6 class="card-title"><i class="fa fa-user"></i> Edit Profil</h6>
         </div>
         <form id="formubahprof">
         
         <input type="hidden" name="fotolama" value="<?php echo $profile->foto_pengguna; ?>">

         <div class="card-body">
            <div id="notifprof"></div>
            <p class="text-center">
               <?php if(file_exists(foto('100','avatar',$profile->foto_pengguna))){ ?>
               <img class="img-thumbnail" src="<?php echo base_url(foto('100','avatar',$profile->foto_pengguna)) ?>" style="width: 100px; height: 100px;">
               <?php } else{ ?>
               <img class="img-thumbnail" src="<?php echo base_url('file/avatar/user.png') ?>" style="width: 100px; height: 100px;">
               <?php } ?>
            </p>
            <div class="form-group">
               <label>Nama</label>
               <input type="text" name="nama_pengguna" class="form-control" value="<?php echo $profile->nama_pengguna; ?>">
            </div>
            <div class="form-group">
               <label>Email</label>
               <input type="text" name="email_pengguna" class="form-control" value="<?php echo $profile->email_pengguna; ?>">
            </div>
            <div class="form-group">
               <label>Username</label>
               <input type="text" name="username_pengguna" class="form-control" value="<?php echo $profile->username_pengguna; ?>">
            </div>
            <div class="form-group">
               <label>Foto</label>
               <input type="file" name="foto_pengguna" class="form-control">
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary" id="btprosprof"><i class="fa fa-check"></i> Simpan Profile</button>
         </div>
         </form>
      </div>
   </div>
   <div class="col-lg-6">
      <div class="card card-default">
         <div class="card-header">
            <h6 class="card-title"><i class="fa fa-lock"></i> Ubah Password</h6>
         </div>
         <form id="formubah">
         
         <div class="card-body">
            <div id="notif"></div>
            <p><b>Password Saat Ini : <?php echo $profile->p_pengguna; ?></b></p>
            <div class="form-group">
               <label>Masukkan Password Baru</label>
               <input type="password" name="passbaru" class="form-control">
            </div>
            <div class="form-group">
               <label>Konfirmasi Password Baru</label>
               <input type="password" name="konfpassbaru" class="form-control">
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary" id="btprosprof"><i class="fa fa-check"></i> Ubah Password</button>
         </div>
         </form>
      </div>
   </div>
</div>
<script type="text/javascript">
  $('#formubah').submit(function(e){
    $.ajax({
      type : "POST",
      url : "<?php echo base_url('setting/ubahpassword') ?>",
      data : $('#formubah').serialize(),
      cache : false,
      beforeSend : function(){
        $('#btpros').html('Sedang Diproses...');
      },
      success : function(response){
        if(response=='1'){
          $('#notif').html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Password berhasil diubah. Refresh halaman untuk melihat perubahan</div>').show();
        }
        else if(response=='2'){
          $('#notif').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> Konfirmasi password baru tidak sesuai.</div>').show();
        }
        else{
          $('#notif').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> Gagal merubah password.</div>').show();
        }
        $('#btpros').html('<i class="fa fa-check"></i> Ubah Password');
      }
    });
    return false;
  });
  $('#formubahprof').submit(function(e){
    e.preventDefault(); 
    $.ajax({
      type : "POST",
      url : "<?php echo base_url('setting/ubahprofil') ?>",
      data : new FormData(this),
      processData : false,
      contentType : false,
      cache : false,
      beforeSend : function(){
        $('#btprosprof').html('Sedang Diproses...');
      },
      success : function(response){
        if(response=='oke'){
          $('#notifprof').html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> Profil berhasil diubah. Refresh halaman untuk melihat perubahan</div>').show();
          $('#btprosprof').html('<i class="fa fa-check"></i> Simpan Profile');
        }
        else{
          $('#notifprof').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> Gagal merubah profil. Periksa inputan anda</div>').show();
          $('#btprosprof').html('<i class="fa fa-check"></i> Simpan Profile');
        }
      }
    });
    return false;
  });
</script>

