<?php
$app= $aplikasi->getrow();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login <?php echo $app->nama_app; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="<?php echo $app->deskripsi_app; ?>" name="description">
        <meta content="Rino Oktavianto" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url($app->icon_app); ?>">
        <!-- Vendor js -->
        <script src="<?php echo base_url('assets'); ?>/js/vendor.min.js"></script>
        <!-- App css -->
        <link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="<?php echo base_url('assets'); ?>/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets'); ?>/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
        <!-- Izi Alert-->
        <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/libs/izi/dist/css/iziToast.min.css">
        <script type="text/javascript" src="<?php echo base_url('assets'); ?>/libs/izi/dist/js/iziToast.min.js"></script>
    </head>
    <body class="authentication-page">
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header p-4 text-center">
                                <h4 class="text-center mb-0 mt-0"><?php echo $app->nama_app; ?></h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('authlogin'); ?>" class="p-2" method="post">
                                    <div class="form-group mb-3">
                                        <label>Username :</label>
                                        <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Password :</label>
                                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="checkbox checkbox-success">
                                            <input id="remember" type="checkbox" name="ingat" value="yes">
                                            <label for="remember">
                                                Ingat Saya
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Login Admin</button>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted mb-0"><span class="badge badge-dark">Versi 1.0</span></p>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <!-- end row -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>
        <?php if(session()->getflashdata('msg')=='gagal'){ ?>
        <script>
          iziToast.show({timeout:5000,color:'red',title: 'Gagal! Username Atau Password Salah',position: 'topRight',pauseOnHover: true,transitionIn: false});
        </script>
        <?php } ?>
        <!-- App js -->
        <script src="<?php echo base_url('assets'); ?>/js/app.min.js"></script>
    </body>
</html>