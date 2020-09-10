<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>FindIt | Ayo Temukan Barang Berhargamu</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="<?= base_url('assets/findit/') ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/findit/') ?>css/style.css" />
    <link rel="stylesheet" href="<?= base_url('assets/findit/') ?>css/ionicons.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/findit/') ?>css/font-awesome.min.css" />
    <link href="<?= base_url('assets/findit/') ?>css/emoji.css" rel="stylesheet">

    <!--Google Webfont-->

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/findit/') ?>images/fav.png" />
</head>

<body>

    <!-- Header
    ================================================= -->
    <header id="header">
        <nav class="navbar navbar-default navbar-fixed-top menu">
            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <sp an class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?= base_url('assets/findit/') ?>images/logo.png" alt="logo" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right main-menu">
                        <li class="dropdown"><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                        <li class="dropdown"><a href="<?= base_url('template_postingan') ?>">Posting</a></li>
                        <li class="dropdown"><a href="<?= base_url('template_laporan') ?>">Buat Laporan</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil Saya <span><img src="<?= base_url('assets/findit/') ?>images/down-arrow.png" alt="" /></span></a>
                            <ul class="dropdown-menu page-list">
                                <li><a href="<?= base_url('profil_user') ?>">Profil</a></li>
                                <li><a href="<?= base_url('login/logout') ?>">Keluar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" onclick="loadMenu('<?= base_url('template_pesan') ?>')">Hubungi Kami</a></li>
                    </ul>
                    <form class="navbar-form navbar-right hidden-sm">
                        <div class="form-group">
                            <i class="icon ion-android-search"></i>
                            <input type="text" class="form-control" placeholder="Cari">
                        </div>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
    </header>
    <!--Header End-->

    <div id="page-contents">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="contact-us">
                        <div class="row">
                            <div class="col-md-8 col-sm-7">
                                <h4 class="grey">Tinggalkan pesan untuk FindIt agar lebih baik kedepannya</h4>
                                <form class="contact-form" id="formpesan" action="<?php echo base_url() . 'index.php/Template_pesan'; ?>" method="post">
                                    <div class="form-group">
                                        <i class="icon ion-person"></i>
                                        <input id="contact-name" type="text" name="nama" class="form-control" placeholder="Masukkan nama *" required="required" data-error="Name is required.">
                                    </div>
                                    <div class="form-group">
                                        <i class="icon ion-email"></i>
                                        <input id="contact-email" type="text" name="email" class="form-control" placeholder="Masukkan email *" required="required" data-error="Email is required.">
                                    </div>
                                    <div class="form-group">
                                        <i class="icon ion-android-call"></i>
                                        <input id="contact-phone" type="text" name="no_telp" class="form-control" placeholder="Masukkan no telepon aktif *" required="required" data-error="Phone is required.">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="form-message" name="isi" class="form-control" placeholder="Tinggalkan pesan *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                    </div>
                                    <div class="card-footer">
                                        <input class="form-control" type="hidden" name="id_pesan" id="id_pesan" value="">
                                        <button class="btn-primary" type="submit" name="submit">Kirim Pesan</button>
                                    </div>
                                </form>
                            </div>


                            <div class="col-md-4 col-sm-5">
                                <h4 class="grey">Kontak Kami</h4>
                                <div class="reach"><span class="phone-icon"><i class="icon ion-android-call"></i></span>
                                    <p>0274123456</p>
                                </div>
                                <div class="reach"><span class="phone-icon"><i class="icon ion-email"></i></span>
                                    <p>findit@gmail.com</p>
                                </div>
                                <div class="reach"><span class="phone-icon"><i class="icon ion-ios-location"></i></span>
                                    <p>Daerah Istimewa Yogyakarta</p>
                                </div>
                                <ul class="list-inline social-icons">
                                    <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                                    <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer
    ================================================= -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="footer-wrapper">
                    <div class="col-md-3 col-sm-3">
                        <a href=""><img src="<?= base_url('assets/findit/') ?>images/logo-black.png" alt="" class="footer-logo" /></a>
                        <ul class="list-inline social-icons">
                            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <h6>Pengguna</h6>
                        <ul class="footer-links">
                            <li><a href="#">Buat Akun</a></li>
                            <li><a href="#">Masuk</a></li>
                            <li><a href="#">Unggah Berita Kehilangan</a></li>
                            <li><a href="#">Unggah Berita Penemuan</a></li>
                            <li><a href="#">Buat Laporan ke Polisi</a></li>
                            <li><a href="#">Komentar</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <h6>Kepolisian</h6>
                        <ul class="footer-links">
                            <li><a href="#">Terima Laporan</a></li>
                            <li><a href="#">Pantau Aktivitas</a></li>
                            <li><a href="#">Dapatkan Informasi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <h6>Tentang</h6>
                        <ul class="footer-links">
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <h6>Hubungi Kami</h6>
                        <ul class="contact">
                            <li><i class="icon ion-ios-telephone-outline"></i>0274123456</li>
                            <li><i class="icon ion-ios-email-outline"></i>FindIt.com</li>
                            <li><i class="icon ion-ios-location-outline"></i>Daerah Istimewa Yogyakarta</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>copyright @FindIt team. All rights reserved</p>
        </div>
    </footer>

    <!--preloader-->
    <div id="spinner-wrapper">
        <div class="spinner"></div>
    </div>

    <!-- Scripts
    ================================================= -->

    <script src="<?= base_url('assets/findit/') ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets/findit/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/findit/') ?>js/jquery.sticky-kit.min.js"></script>
    <script src="<?= base_url('assets/findit/') ?>js/jquery.scrollbar.min.js"></script>
    <script src="<?= base_url('assets/findit/') ?>js/script.js"></script>


    <script type="text/javascript">
        $('#formpesan').on('submit', function(e) {
            e.preventDefault();
            sendDataPost();
        });

        function loadMenu(url) {
            $.ajax(url, {
                type: 'GET',
                success: function(data, status, xhr) {
                    var objData = JSON.parse(data)
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    alert('Error: ' + errorMsg);
                }
            })
        }

        function sendDataPost() {

            var link = 'http://localhost/Praktikum/findit/backend_findit/template_pesan/create_action/';

            var dataForm = new FormData();
            var allInput = $('.form-control');

            $.each(allInput, function(i, val) {
                dataForm.append(val['name'], val['value']);
            });


            $.ajax(link, {
                type: 'POST',
                data: dataForm,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data, status, xhr) {
                    //var data_str = JSON.parse(data);
                    alert(data['pesan']);
                    //loadMenu('<?= base_url('template_pesan') ?>');
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    alert('Error : ' + errorMsg);
                }
            });
        }
    </script>

</body>

</html>