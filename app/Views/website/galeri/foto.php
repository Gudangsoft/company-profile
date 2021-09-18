<?php 
$this->request= \Config\services::request();
if($this->request->getpostget('show')!=null){
  $show= $this->request->getpostget('show');
}
else{
  $show= 8;
}
if($this->request->getpostget('page')!=null){
  $page= $this->request->getpostget('page');
}
else{
  $page= 1;
}
$banyakpage= $allgaleri->getrowcount()/$show;
?>
      <section class="section breadcrumb-section">
        <div class="container">
          <!-- Breadcrumb-->
          <div class="breadcrumb">
            <div class="breadcrumb-inner">
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url(); ?>">Home</a></div>
              <div class="breadcrumb-item"><span class="breadcrumb-text breadcrumb-active">Galeri Foto</span></div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-md bg-transparent text-center">
        <div class="container">
          <h4>Galeri Foto Kami</h4>
          <div class="row no-gutters justify-content-center" data-lightgallery="">
            <?php foreach($galeri->getresult() as $gal){ ?>
            <div class="col-6 col-xs-4 col-md-3">
                    <!-- Thumbnail gallery-->
                    <div class="thumbnail thumbnail-gallery"><a class="thumbnail-media lightgallery-item" href="<?php echo base_url($gal->foto_galeri); ?>"><img class="thumbnail-img" src="<?php echo base_url(foto('300','galeri',$gal->foto_galeri)); ?>" alt="" width="350" height="350">
                        <div class="thumbnail-media-caption">
                          <div class="thumbnail-media-icon custom-font-maximize"></div>
                        </div></a></div>
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
                    <a class="page-link" href="'.base_url('foto?show='.$show.'&page='.$n).'">&#10094;</a></li>
                    ';
                  }
                  if($page >= 1){
                    for ($i=1; $i <= ceil($banyakpage); $i++) { 
                      if($page==$i){ $act= 'active'; $bg= 'background-color: #00c689;'; }else{ $act= ''; $bg= ''; }
                      echo '
                      <li class="page-item"><a class="page-link '.$act.'" href="'.base_url('foto?show='.$show.'&page='.$i).'" style="'.$bg.'">'.$i.'</a></li>';
                    }
                  }
                  if($page < ceil($banyakpage)){
                    $n= $page+1;
                    echo '
                    <li class="page-item"><a class="page-link" href="'.base_url('foto?show='.$show.'&page='.$n).'">&#10095;</a></li>
                    ';
                  }
                  ?> 
                </ul>
              </nav>
            </div>
            <?php } ?>
        </div>
      </section>