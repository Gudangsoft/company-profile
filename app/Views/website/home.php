<?php 
$app= $aplikasi->getrow();
?>
      <!-- Swiper default-->
      <section class="swiper-container swiper-1 context-dark text-center" data-swiper="">
        <!-- Additional required wrapper-->
        <div class="swiper-wrapper">
          <?php foreach($slider->getresult() as $sl){ ?>
          <!-- Slides-->
          <div class="swiper-slide section-md" style="background-image: linear-gradient(to bottom, rgba(20,20,20,0.6),rgba(20,20,20,0.6)), url(<?php echo base_url(foto('1900','slider',$sl->foto_slider)); ?>)">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7">
                  <h2><?php echo $sl->judul_slider; ?></h2>
                  <p class="big"><?php echo $sl->isi_slider; ?></p><a class="btn btn-primary" href="<?php echo $sl->link_slider; ?>">Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <!-- Pagination-->
        <div class="swiper-pagination"></div>
      </section>
      
      <!-- Blurb default-->
      <section class="section-md bg-transparent text-center">
        <div class="container">
          <div class="text-block text-block-1" data-animate='{"class":"fadeIn"}'>
            <h5 class="text-primary">Our Service</h5>
            <h3>Keunggulan Pelayanan Kami</h3>
            <p class="big">Kami Terus Melakukan Perbaikan Baik Dari Segi Pelayanan & Fasilitas. Kami Juga Terus Berupaya Meningkatkan Kualitas SDM</p>
          </div>
          <div class="row row-30 justify-content-center">
            <?php foreach($ourservice->getresult() as $ou){ ?>
            <div class="col-sm-6 col-md-4">
              <!-- Blurb-->
              <article class="blurb blurb-2" data-animate='{"class":"fadeInUp"}'>
                <div class="icon blurb-icon"><img class="icon blurb-icon" src="<?php echo base_url(foto('200','ourservice',$ou->foto_ourservice)); ?>" width="80"></div>
                <div class="blurb-title h4"><?php echo $ou->judul_ourservice; ?></div>
                <div class="blurb-text big"><?php echo $ou->isi_ourservice; ?></div>
              </article>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
      <section class="section-md bg-transparent text-center">
        <div class="container">
          <div class="text-block text-block-1" data-animate='{"class":"fadeIn"}'>
            <h3>Berbagai Acara Kami</h3>
            <p class="big">Jangan Terlewatkan Untuk Lihat Semua Acara Kami Yang Akan Datang Ataupun Sudah Dilakasanan</p>
          </div>
          <div class="row row-30 justify-content-center">
            <?php foreach($acara->getresult() as $ac){ ?>
            <div class="col-xs-8 col-sm-6 col-md-4">
                    <!-- Post event-->
                    <div class="post post-event" data-animate='{"class":"fadeInUp"}'><a class="post-media" href="<?php echo base_url('lihat/'.$ac->slug_acara) ?>"><img class="post-img" src="<?php echo base_url(foto('400','acara',$ac->foto_acara)); ?>" alt="" width="370" style="height: 220px;">
                        <div class="post-date">
                          <div class="post-day"><?php echo format('d',$ac->tgl_acara); ?></div>
                          <div class="post-month"><?php echo format('M',$ac->tgl_acara); ?></div>
                        </div></a>
                      <div class="post-heading h4">
                        <div class="post-title"><a href="<?php echo base_url('lihat/'.$ac->slug_acara) ?>"><?php echo $ac->judul_acara; ?></a></div>
                      </div>
                      <div class="post-meta post-meta-vertical big">
                        <div class="post-meta-item">
                          <div class="post-meta-icon custom-font-clock"></div>
                          <div class="post-time"><?php echo jam($ac->mulai_acara); ?> - <?php echo jam($ac->selesai_acara); ?></div>
                        </div>
                        <div class="post-meta-item">
                          <div class="post-meta-icon custom-font-pin"></div>
                          <div class="post-location"><?php echo $ac->tempat_acara; ?></div>
                        </div>
                      </div>
                    </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
      <section class="section-md bg-300 text-center">
        <div class="container">
          <div class="text-block text-block-1" data-animate='{"class":"fadeIn"}'>
            <h3>Galeri Kami</h3>
          </div>
          <div class="owl-carousel owl-content-1" data-owl="{&quot;dots&quot;:true}" data-loop="false" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4">
                <?php foreach($galeri->getresult() as $gal){ ?>
                  <!-- Price box-->
                  <div class="price-box">
                    <div class="price-box-media"><img class="price-box-img" src="<?php echo base_url(foto('300','galeri',$gal->foto_galeri)); ?>" width="270" height="220">
                    </div>
                  </div>
                  <!-- Price box-->
                <?php } ?>
          </div>
        </div>
      </section>
      <!-- Blog-->
      <section class="section-md bg-transparent">
        <div class="container">
          <div class="text-block text-block-1 text-center" data-animate='{"class":"fadeIn"}'>
            <h3>Artikel Sekolah</h3>
            <p class="big">Baca Kegiatan Info Populer Dan Menarik Seputar Sekolah Kami</p>
          </div>
          <div class="row row-30 justify-content-center">
            <div class="col-xs-10 col-sm-6">
                  <?php $arut= $artikeluta->getrowarray(); ?>
                    <!-- Post-->
                    <div class="post" data-animate='{"class":"fadeIn"}'><a class="post-media" href="<?php echo base_url('baca/'.$arut['slug_artikel']) ?>"><img class="post-img" src="<?php echo base_url(folder('500','artikel',$arut['foto_artikel'])); ?>" alt="" width="570" height="380"></a>
                      <div class="post-meta">
                        <div class="post-meta-item">
                          <div class="post-meta-icon custom-font-calendar"></div>
                          <div class="post-date"><?php echo dmywaktu($arut['tglinput_artikel']); ?></div>
                        </div>
                        <div class="post-meta-item">
                          <div class="post-meta-icon"><i class="fa fa-tag"></i></div>
                          <div class="post-comment"><?php echo $arut['nama_kategori']; ?></div>
                        </div>
                      </div>
                      <div class="post-title h6"><a href="<?php echo base_url('baca/'.$arut['slug_artikel']) ?>"><?php echo $arut['judul_artikel']; ?></a></div>
                      <div class="post-text"><?php echo sub(250,$arut['isi_artikel']); ?>..</div>
                    </div>
            </div>
            <div class="col-xs-10 col-sm-6">
                  <?php foreach($artikelsam->getresult() as $ars){ if($ars->id_artikel!=$arut['id_artikel']){ ?>
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
                      <div class="post-text"><?php echo sub(200,$ars->isi_artikel); ?>..</div>
                    </div>
                  <?php } } ?>
            </div>
          </div>
        </div>
      </section>