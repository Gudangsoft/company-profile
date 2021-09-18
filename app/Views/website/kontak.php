<?php 
$app= $aplikasi->getrow();
?>
      <section class="section breadcrumb-section">
        <div class="container">
          <!-- Breadcrumb-->
          <div class="breadcrumb">
            <div class="breadcrumb-inner">
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url() ?>">Home</a></div>
              <div class="breadcrumb-item"><span class="breadcrumb-text breadcrumb-active">Kontak</span></div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-md bg-transparent">
        <div class="container">
          <div class="text-block text-block-1 text-center">
            <h4>Kontak Kami</h4>
          </div>
          <div class="row row-30">
            <div class="col-md-7">
              <?php if(session()->getflashdata('msg')=='gagal'){ ?>
              <p class="text-danger"><b><i class="fa fa-exclamation"></i> Pesan Gagal Terkirim</b></p>
              <?php } ?>
              <?php if(session()->getflashdata('msg')=='berhasil'){ ?>
              <p class="text-success"><b><i class="fa fa-check"></i> Pesan Berhasil Terkirim</b></p>
              <?php } ?>
              <form class="rd-form" method="post" action="<?php echo base_url('sendemail'); ?>">
                <div class="row row-20">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" type="text" name="name" placeholder="Nama*" required="" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" type="email" name="email" placeholder="E-mail*" required="" data-constraints="@Email @Required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" type="text" name="phone" placeholder="No HP*" required="" data-constraints="@Numeric @Required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" type="text" name="subject" placeholder="Subjek" required="">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <textarea class="form-control" name="textarea" placeholder="Pesan" required=""></textarea>
                    </div>
                  </div>
                </div>
                <div class="rd-form-btn text-left">
                  <button class="btn btn-primary">Kirim Pesan</button>
                </div>
              </form>
            </div>
            <div class="col-md-5">
              <h5 class="text-primary"><?php echo $app->nama_app; ?></h5>
              <p><?php echo $app->deskripsi_app; ?></p>
              <h5 class="text-primary">Informasi</h5>
              <ul class="list list-icons">
                <li class="list-item">
                  <div class="list-icon custom-font-pin"></div><a class="link link-inherit" href="#"><?php echo $app->alamat_app; ?></a>
                </li>
                <li class="list-item">
                  <div class="list-icon custom-font-email"></div><a class="link link-inherit" href="mailto:<?php echo $app->email_app; ?>"><?php echo $app->email_app; ?></a>
                </li>
                <li class="list-item">
                  <div class="list-icon custom-font-phone"></div><span><span>Hubungi: </span><a class="link link-inherit" href="tel:<?php echo $app->nohp_app; ?>"><?php echo $app->nohp_app; ?></a></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>