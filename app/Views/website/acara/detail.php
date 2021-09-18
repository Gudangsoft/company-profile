      <section class="section breadcrumb-section">
        <div class="container">
          <!-- Breadcrumb-->
          <div class="breadcrumb">
            <div class="breadcrumb-inner">
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url() ?>">Home</a></div>
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url('acara'); ?>">Acara</a></div>
              <div class="breadcrumb-item"><span class="breadcrumb-text breadcrumb-active"><?php echo $acara->judul_acara; ?></span></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Post single-->
      <section class="section-md bg-transparent">
        <div class="container">
          <div class="row row-30 justify-content-center">
            <div class="col-md-6 col-lg-8">
              <div class="post">
                <div class="post-media"><img class="post-img" src="<?php echo base_url(foto('900','acara',$acara->foto_acara)); ?>" alt="" width="769" height="380">
                </div>
                <div class="post-meta">
                  <div class="post-meta-item">
                    <div class="post-meta-icon custom-font-calendar"></div>
                    <div class="post-date"><?php echo hari($acara->tgl_acara).', '.tgl($acara->tgl_acara); ?></div>
                  </div>
                  <div class="post-meta-item">
                    <div class="post-meta-icon custom-font-clock"></div>
                    <div class="post-comment"><?php echo jam($acara->mulai_acara); ?> - <?php echo jam($acara->selesai_acara); ?></div>
                  </div>
                  <div class="post-meta-item">
                    <div class="post-meta-icon custom-font-pin"></div>
                    <div class="post-comment"><?php echo $acara->tempat_acara; ?></div>
                  </div>
                </div>
                <div class="post-title h6"><?php echo $acara->judul_acara; ?></div>
                <div class="post-text">
                  <?php echo $acara->isi_acara; ?>
                </div>
                <div class="post-text">
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_email"></a>
                    <a class="a2a_button_whatsapp"></a>
                    <a class="a2a_button_facebook_messenger"></a>
                    </div>
                    <script>
                    var a2a_config = a2a_config || {};
                    a2a_config.locale = "id";
                    </script>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="widget">
                <div class="widget-title h5">Popular Artikel</div>
                <div class="widget-body">
                  <?php foreach($popular->getresult() as $ars){ ?>
                    <!-- Post-->
                    <div class="post" data-animate='{"class":"fadeInUp"}'>
                      <div class="post-meta">
                        <div class="post-meta-item">
                          <div class="post-meta-icon custom-font-calendar"></div>
                          <div class="post-date"><?php echo dmywaktu($ars->tglinput_artikel); ?></div>
                        </div>
                        <div class="post-meta-item">
                          <div class="post-meta-icon"><i class="fa fa-tag"></i></div>
                          <div class="post-comment"><?php echo $ars->nama_kategori; ?></div>
                        </div>
                      </div>
                      <div class="post-title h6"><a href="<?php echo base_url('baca/'.$ars->slug_artikel) ?>"><?php echo $ars->judul_artikel; ?></a></div>
                      <div class="post-text"><?php echo sub(100,$ars->isi_artikel); ?>..</div>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="widget">
                <div class="widget-title h5">Kategori</div>
                <div class="widget-body">
                  <ul class="widget-list">
                    <?php foreach($kategori->getresult() as $ka){ ?>
                    <li class="widget-list-item"><a class="link link-inherit" href="<?php echo base_url('kategori/'.$ka->slug_kategori); ?>"><?php echo $ka->nama_kategori; ?> (<?php echo $ka->jumart; ?>)</a></li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </section>