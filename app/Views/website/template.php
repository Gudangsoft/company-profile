<?php
use App\Models\Mmenu;
$this->Mmenu= new Mmenu();
$app= $aplikasi->getrow();
if(!empty($classhead)){
  $ch= "section rd-navbar-wrap";
}
else{
  $ch= "section rd-navbar-absolute-wrap";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title; ?> | <?php echo $app->nama_app; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="<?php echo $ogtitle; ?>">
    <meta property="og:description" content="<?php echo $ogdescription; ?>">
    <meta property="og:image" content="<?php echo $ogimage; ?>">
    <script type="text/javascript">
      var baseurl= "<?php echo base_url(); ?>";
    </script>
    <link rel="icon" href="<?php echo base_url($app->icon_app); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/components/base/base.css">
    <script src="<?php echo base_url(); ?>/components/base/core.min.js"></script>
    <script src="<?php echo base_url(); ?>/components/base/script.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/jquery-1.12.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/components/paging/css/style.css"> <!-- Resource style -->
    <link href="<?php echo base_url('assets'); ?>/libs/bootstrap-sweetalert/sweetalert.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets'); ?>/libs/bootstrap-sweetalert/sweetalert.min.js"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/components/release/featherlight.min.css" />
    <script src="<?php echo base_url(); ?>/components/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">
      .lightbox { display: none; }
    </style>
  </head>
  <body>
    <div class="page">
      <!--RD Navbar-->
      <header class="<?php echo $ch; ?>" data-preset='{"title":"Navbar Default","category":"header","reload":true,"id":"navbar-default"}'>
        <nav class="rd-navbar" data-rd-navbar='{"responsive":{"1200":{"stickUpOffset":"50px"}}}'>
          <div class="navbar-container">
            <div class="navbar-cell">
              <div class="navbar-panel">
                <button class="navbar-switch novi-icon custom-font-menu" data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","isolate":"[data-multi-switch]"}'></button>
                <div class="navbar-logo"><a class="navbar-logo-link" href="<?php echo base_url() ?>">
                  <img class="navbar-logo-inverse" src="<?php echo base_url($app->logo_app); ?>" alt="Teachzy" width="198" height="50"></a></div>
              </div>
            </div>
            <div class="navbar-spacer"></div>
            <div class="navbar-cell navbar-sidebar">
              <ul class="navbar-navigation rd-navbar-nav">
                <?php foreach($menu->getresult() as $me){
                  $submenu= $this->Mmenu->submenu($me->id_menu);
                  if($submenu->getrowcount() > 0){
                    echo '
                    <li class="navbar-navigation-root-item"><a target="'.$me->target_menu.'"  class="navbar-navigation-root-link" href="'.$me->url_menu.'">'.$me->nama_menu.'</a>
                      <ul class="navbar-navigation-dropdown rd-navbar-dropdown">
                        <li class="navbar-navigation-back">
                          <button class="navbar-navigation-back-btn">Kembali</button>
                        </li>';
                      foreach($submenu->getresult() as $su){
                        echo '
                        <li class="navbar-navigation-dropdown-item"><a target="'.$su->target_menu.'" class="navbar-navigation-dropdown-link" href="'.$su->url_menu.'">'.$su->nama_menu.'</a>
                        </li>';
                      }
                    echo '
                      </ul>
                    </li>';
                  }
                  else{
                    echo '
                    <li class="navbar-navigation-root-item"><a target="'.$me->target_menu.'" class="navbar-navigation-root-link" href="'.$me->url_menu.'">'.$me->nama_menu.'</a>
                    </li>';
                  }
                }
                ?>
              </ul>
            </div>
            <div class="navbar-spacer"></div>
          </div>
        </nav>
      </header>
      
      <?php echo $_content; ?>

      <!-- Footer default-->
      <footer class="section footer">
        <div class="footer-top bg-300">
          <div class="container">
            <div class="row row-30">
              <div class="col-xs-6 col-md-4">
                <h5 class="footer-title">Kontak Kami</h5>
                <ul class="list list-icons">
                  <li class="list-item">
                    <div class="list-icon custom-font-pin"></div><a class="link link-inherit" href="#"><?php echo $app->alamat_app; ?></a>
                  </li>
                  <li class="list-item">
                    <div class="list-icon custom-font-email"></div><a class="link link-inherit" href="mailto:<?php echo $app->email_app; ?>"><?php echo $app->email_app; ?></a>
                  </li>
                  <li class="list-item">
                    <div class="list-icon custom-font-phone"></div><span><span>Telepon: </span><a class="link link-inherit" href="tel<?php echo $app->nohp_app; ?>"><?php echo $app->nohp_app; ?></a></span>
                  </li>
                </ul>
              </div>
              <div class="col-6 col-md-4">
                <h5 class="footer-title">Menu Utama</h5>
                <ul class="list list-sm">
                  <li class="list-item"><a class="link link-inherit" href="<?php echo base_url() ?>">Home</a></li>
                  <li class="list-item"><a class="link link-inherit" href="<?php echo base_url('acara') ?>">Acara</a></li>
                  <li class="list-item"><a class="link link-inherit" href="<?php echo base_url('artikel') ?>">Artikel</a></li>
                  <li class="list-item"><a class="link link-inherit" href="<?php echo base_url('kontak') ?>">Kontak</a></li>
                </ul>
              </div>
              <div class="col-6 col-md-4">
                <h5 class="footer-title">Sosial Media</h5>
                <ul class="list list-sm">
                  <li class="list-item"><a class="link link-inherit" href="<?php echo $app->fb_app; ?>">Facebook</a></li>
                  <li class="list-item"><a class="link link-inherit" href="<?php echo $app->ig_app; ?>">Instagram</a></li>
                  <li class="list-item"><a class="link link-inherit" href="<?php echo $app->tw_app; ?>">Twitter</a></li>
                  <li class="list-item"><a class="link link-inherit" href="<?php echo $app->yt_app; ?>">YouTube</a></li>
                </ul>
              </div>
              
            </div>
          </div>
        </div>
        <div class="footer-bottom bg-700 context-dark text-center">
          <div class="container">
                  <!-- Copyright-->
                  <p class="rights"><span>&copy; eycoss 2020&nbsp;</span><span><?php echo $app->nama_app; ?></span><span> Didevelop Oleh </span><a class="link link-inherit" href="https://gudangsoft.net">Gudangsoft.Net</a></p>
          </div>
        </div>
      </footer>
    </div>
    <!-- Preloader-->
    <div class="preloader">
      <div class="preloader-inner">
        <div class="preloader-dot"></div>
        <div class="preloader-dot"></div>
        <div class="preloader-dot"></div>
        <div class="preloader-dot"></div>
      </div>
    </div>
  </body>
</html>