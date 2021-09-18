      <section class="section breadcrumb-section">
        <div class="container">
          <!-- Breadcrumb-->
          <div class="breadcrumb">
            <div class="breadcrumb-inner">
              <div class="breadcrumb-item"><a class="breadcrumb-link" href="<?php echo base_url() ?>">Home</a></div>
              <div class="breadcrumb-item"><span class="breadcrumb-text breadcrumb-active"><?php echo $halaman->judul_halaman; ?></span></div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-md bg-transparent">
        <div class="container">
          <dl class="term-list">
            <h5><?php echo $halaman->judul_halaman; ?></h5>
            <dd><?php echo $halaman->isi_halaman; ?></dd>
          </dl>
          <dl class="term-list">
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
          </dl>
        </div>
      </section>