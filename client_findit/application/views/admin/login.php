<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminFindIt | Sign in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#" class="logo"><img src="<?= base_url('assets/admin/') ?>logo-black.png" alt="FindIt" /></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login Admin</p>

                <form action="<?= base_url('login'); ?>" method="post">
                    <div class="form-group">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="masukkan nama pengguna" id="nama_pengguna" name="nama_pengguna" value="<?= set_value('nama_pengguna') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user nav-icon"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('nama_pengguna', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-1">
                            <br>
                            <input type="password" class="form-control" placeholder="masukkan kata sandi" id="kata_sandi" name="kata_sandi">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('kata_sandi', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="<?= base_url('assets/admin/') ?>plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('assets/admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/admin/') ?>dist/js/adminlte.min.js"></script>

</body>

</html>