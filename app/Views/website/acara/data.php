 <?php 
$this->request= \Config\services::request();
if($this->request->getpostget('show')!=null){
  $show= $this->request->getpostget('show');
}
else{
  $show= 6;
}
if($this->request->getpostget('page')!=null){
  $page= $this->request->getpostget('page');
}
else{
  $page= 1;
}
$banyakpage= $allacara->getrowcount()/$show;
?>
      <section class="section breadcrumb-section">
        <div class="container">
          <!-- Breadcrumb-->
          <div class="breadcrumb">
            <div class="breadcrumb-inner">
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url(); ?>">Home</a></div>
              <div class="breadcrumb-item"><span class="breadcrumb-text breadcrumb-active">Acara Sekolah</span></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Post event-->
      <section class="section-md bg-transparent text-center">
        <div class="container">
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
            <?php if($banyakpage > 1){ ?>
            <br>
            <div class="row justify-content-center">
              <nav role="navigation">
                <ul class="pagination d-flex justify-content-center flex-wrap pagination-flat pagination-success">
                  <?php 
                  if($page > 1){
                    $n= $page-1;
                    echo '
                    <li class="page-item">
                    <a class="page-link" href="'.base_url('acara?show='.$show.'&page='.$n).'">&#10094;</a></li>
                    ';
                  }
                  if($page >= 1){
                    for ($i=1; $i <= ceil($banyakpage); $i++) { 
                      if($page==$i){ $act= 'active'; $bg= 'background-color: #00c689;'; }else{ $act= ''; $bg= ''; }
                      echo '
                      <li class="page-item"><a class="page-link '.$act.'" href="'.base_url('acara?show='.$show.'&page='.$i).'" style="'.$bg.'">'.$i.'</a></li>';
                    }
                  }
                  if($page < ceil($banyakpage)){
                    $n= $page+1;
                    echo '
                    <li class="page-item"><a class="page-link" href="'.base_url('acara?show='.$show.'&page='.$n).'">&#10095;</a></li>
                    ';
                  }
                  ?> 
                </ul>
              </nav>
            </div>
            <?php } ?>
        </div>
      </section>
