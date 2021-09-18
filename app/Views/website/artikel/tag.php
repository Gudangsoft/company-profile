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
$banyakpage= $allartikel->getrowcount()/$show;
?>
      <section class="section breadcrumb-section">
        <div class="container">
          <!-- Breadcrumb-->
          <div class="breadcrumb">
            <div class="breadcrumb-inner">
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url(); ?>">Home</a></div>
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url('kategori/'.$getka->slug_kategori); ?>">Kategori Artikel</a></div>
              <div class="breadcrumb-item"><span class="breadcrumb-text breadcrumb-active"><?php echo $getka->nama_kategori; ?></span></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Post event-->
      <section class="section-md bg-transparent text-center">
        <div class="container">
          <div class="row row-30 justify-content-center">
            <?php foreach($artikel->getresult() as $ar){ ?>
            <div class="col-xs-8 col-sm-6 col-md-4">
                    <!-- Post-->
                    <div class="post post-offset"><a class="post-media" href="<?php echo base_url('baca/'.$ar->slug_artikel); ?>"><img class="post-img" src="<?php echo base_url(folder('500','artikel',$ar->foto_artikel)); ?>" alt="" width="370" style="height: 220px;"></a>
                      <div class="post-meta">
                        <div class="post-meta-item">
                          <div class="post-meta-icon custom-font-calendar"></div>
                          <div class="post-date"><?php echo dmywaktu($ar->tglinput_artikel); ?></div>
                        </div>
                        <div class="post-meta-item">
                          <div class="post-meta-icon"><i class="fa fa-tag"></i></div>
                          <div class="post-comment"><?php echo $ar->nama_kategori; ?></div>
                        </div>
                        <div class="post-meta-item">
                          <div class="post-meta-icon"><i class="fa fa-eye"></i></div>
                          <div class="post-comment">Dilihat <?php echo $ar->dilihat_artikel; ?>x</div>
                        </div>
                      </div>
                      <div class="post-title h6"><a href="<?php echo base_url('baca/'.$ar->slug_artikel); ?>"><?php echo $ar->judul_artikel; ?></a></div>
                      <div class="post-text"><?php echo sub(150,$ar->isi_artikel); ?>..</div>
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
                    <a class="page-link" href="'.base_url('kategori/'.$getka->slug_kategori.'?show='.$show.'&page='.$n).'">&#10094;</a></li>
                    ';
                  }
                  if($page >= 1){
                    for ($i=1; $i <= ceil($banyakpage); $i++) { 
                      if($page==$i){ $act= 'active'; $bg= 'background-color: #00c689;'; }else{ $act= ''; $bg= ''; }
                      echo '
                      <li class="page-item"><a class="page-link '.$act.'" href="'.base_url('kategori/'.$getka->slug_kategori.'?show='.$show.'&page='.$i).'" style="'.$bg.'">'.$i.'</a></li>';
                    }
                  }
                  if($page < ceil($banyakpage)){
                    $n= $page+1;
                    echo '
                    <li class="page-item"><a class="page-link" href="'.base_url('kategori/'.$getka->slug_kategori.'?show='.$show.'&page='.$n).'">&#10095;</a></li>
                    ';
                  }
                  ?> 
                </ul>
              </nav>
            </div>
            <?php } ?>
        </div>
      </section>
