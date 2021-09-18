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
$banyakpage= $allvideo->getrowcount()/$show;
?>
      <section class="section breadcrumb-section">
        <div class="container">
          <!-- Breadcrumb-->
          <div class="breadcrumb">
            <div class="breadcrumb-inner">
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url(); ?>">Home</a></div>
              <div class="breadcrumb-item"><span class="breadcrumb-text breadcrumb-active">Galeri Video</span></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Post event-->
      <section class="section-md bg-transparent text-center">
        <div class="container">
          <h4>Galeri Video Kami</h4>
          <div class="row row-30 justify-content-center">
            <?php foreach($video->getresult() as $vi){ ?>
            <div class="col-xs-8 col-sm-6 col-md-4">
                    <!-- Post event-->
                    <div class="post post-offset" data-animate='{"class":"fadeInUp"}'>
                      <a class="post-media">
                        <?php echo toyoutube($vi->youtube_video) ?>
                      </a>
                      <div class="post-text"><?php echo sub(150,$vi->ket_video); ?>..</div>
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
                    <a class="page-link" href="'.base_url('video?show='.$show.'&page='.$n).'">&#10094;</a></li>
                    ';
                  }
                  if($page >= 1){
                    for ($i=1; $i <= ceil($banyakpage); $i++) { 
                      if($page==$i){ $act= 'active'; $bg= 'background-color: #00c689;'; }else{ $act= ''; $bg= ''; }
                      echo '
                      <li class="page-item"><a class="page-link '.$act.'" href="'.base_url('video?show='.$show.'&page='.$i).'" style="'.$bg.'">'.$i.'</a></li>';
                    }
                  }
                  if($page < ceil($banyakpage)){
                    $n= $page+1;
                    echo '
                    <li class="page-item"><a class="page-link" href="'.base_url('video?show='.$show.'&page='.$n).'">&#10095;</a></li>
                    ';
                  }
                  ?> 
                </ul>
              </nav>
            </div>
            <?php } ?>
        </div>
      </section>
