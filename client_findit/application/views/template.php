<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin FindIt | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css"> <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="modal" data-target="#ProfilModal" href="#">
                        <i class="fa fa-user"> <?= $admin['nama']; ?></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="<?= base_url('login/logout/') ?>" class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-sign-out-alt">Logout</i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Logout Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin keluar ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('login/logout/') ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Logout Modal -->

        <!-- Profil Modal -->
        <div class="modal fade" id="ProfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Profil Saya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Nama : </b> <?= $admin['nama']; ?></li>
                                    <li class="list-group-item"><b>Jenis Kelamin : </b> <?= $admin['jeniskelamin']; ?></li>
                                    <li class="list-group-item"><b>No Telepon : </b> <?= $admin['no_telp']; ?></li>
                                    <li class="list-group-item"><b>Email : </b> <?= $admin['email']; ?></li>
                                    <li class="list-group-item"><b>Nama Pengguna : </b> <?= $admin['nama_pengguna']; ?></li>
                                    <li class="list-group-item"><b>Kata Sandi : </b> <?= $admin['kata_sandi']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- profil Modal -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?= base_url('assets/admin/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin FindIt</span>
            </a>

            <!-- Sidebar -->
            <br>
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="loadMenu('<?= base_url('admin') ?>')">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="loadMenu('<?= base_url('pengguna') ?>')">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Pengguna</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="loadMenu('<?= base_url('kantor') ?>')">
                                        <i class="far fa-building nav-icon"></i>
                                        <p>Kantor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="loadMenu('<?= base_url('laporan') ?>')">
                                        <i class="fas fa-file-signature nav-icon"></i>
                                        <p>Pelaporan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="loadMenu('<?= base_url('postingan') ?>')">
                                        <i class="far fa-address-card nav-icon"></i>
                                        <p>Postingan</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="loadMenu('<?= base_url('komentar') ?>')">
                                        <i class="far fa-comment-dots nav-icon"></i>
                                        <p>Komentar</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="loadMenu('<?= base_url('pesan') ?>')">
                                        <i class="far fa-comments nav-icon"></i>
                                        <p>Pesan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <h3>
                        <div class="content-title">
                        </div>
                    </h3>

                </div><!-- /.container-fluid -->
            </section>
            <!-- Content Header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid" id="kontenTemplate">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    Hello <?= $admin['nama']; ?> <br>Start Your Session
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="#">findit.com</a>.</strong> All rights
            reserved.
        </footer>

        <!-- jQuery -->
        <script src="<?= base_url('assets/admin/') ?>plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?= base_url('assets/admin/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('assets/admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="<?= base_url('assets/admin/') ?>plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?= base_url('assets/admin/') ?>plugins/sparklines/sparkline.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?= base_url('assets/admin/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?= base_url('assets/admin/') ?>plugins/moment/moment.min.js"></script>
        <script src="<?= base_url('assets/admin/') ?>plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?= base_url('assets/admin/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?= base_url('assets/admin/') ?>plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?= base_url('assets/admin/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/admin/') ?>dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?= base_url('assets/admin/') ?>dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url('assets/admin/') ?>dist/js/demo.js"></script>

        <!-- DataTables -->
        <script src="<?= base_url('assets/admin/') ?>plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?= base_url('assets/admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

        <script type="text/javascript">
            function loadMenu(url) {
                $.ajax(url, {
                    type: 'GET',
                    success: function(data, status, xhr) {
                        var objData = JSON.parse(data)

                        $('#kontenTemplate').html(objData.konten);
                        $('title').html(objData.titel);
                        $('.content-title').html(objData.titel);
                    },
                    error: function(jqXHR, textStatus, errorMsg) {
                        alert('Error: ' + errorMsg);
                    }
                });
            }
        </script>
</body>

</html>