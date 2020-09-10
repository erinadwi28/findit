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
    <!--Google Webfont-->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700' rel='stylesheet' type='text/css'>
    <!--Favicon-->
    <link rel="shortcut icon" type="<?= base_url('assets/findit/') ?>image/png" href="images/fav.png" />
</head>

<body>

    <!-- Header
    ================================================= -->
    <header id="header" class="lazy-load">
        <nav class="navbar navbar-default navbar-fixed-top menu">
            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
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
                        <li class="dropdown"><a href="<?= base_url('template_pesan') ?>">Hubungi Kami</a></li>
                    </ul>
                    <form class="navbar-form navbar-right hidden-sm">
                        <div class="form-group">
                            <i class="icon ion-android-search"></i>
                            <input type="text" class="form-control" placeholder="cari">
                        </div>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
    </header>
    <!--Header End-->

    <!-- Top Banner
    ================================================= -->
    <section id="banner">
        <div class="container">
            <!-- Login Form
        ================================================= -->
            <div class="sign-up-form">
                <a href="index.html" class="logo"><img src="<?= base_url('assets/findit/') ?>images/logo.png" alt="Friend Finder" /></a>
                <h2 class="text-white">Selamat Datang</h2>
                <div class="line-divider"></div>
                <div class="form-wrapper">
                    <h4 class="text-white"><?= $this->session->userdata('nama'); ?></h4>
                    </br>

                </div>
            </div><!-- Sign Up Form End -->

            <svg class="arrows hidden-xs hidden-sm">
                <path class="a1" d="M0 0 L30 32 L60 0"></path>
                <path class="a2" d="M0 20 L30 52 L60 20"></path>
                <path class="a3" d="M0 40 L30 72 L60 40"></path>
            </svg>
            <div style="text-align: center; align-items: center;">


            </div>
        </div>
    </section>

    <!-- Features Section
    ================================================= -->
    <section id="features">
        <div class="container wrapper">
            <h1 class="section-title slideDown">social</h1>
            <div class="row slideUp">
                <div class="feature-item col-md-2 col-sm-6 col-xs-6 col-md-offset-2">
                    <div class="feature-icon"><i class="icon ion-person-add"></i></div>
                    <h4>Tambah Relasi</h4>
                </div>
                <div class="feature-item col-md-2 col-sm-6 col-xs-6">
                    <div class="feature-icon"><i class="icon ion-images"></i></div>
                    <h4>Postingan Publik</h4>
                </div>
                <div class="feature-item col-md-2 col-sm-6 col-xs-6">
                    <div class="feature-icon"><i class="icon ion-chatbox-working"></i></div>
                    <h4>Berikan Informasi</h4>
                </div>
                <div class="feature-item col-md-2 col-sm-6 col-xs-6">
                    <div class="feature-icon"><i class="icon ion-compose"></i></div>
                    <h4>Buat Laporan ke Kepolisian</h4>
                </div>
            </div>
        </div>

    </section>

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
    <script src="<?= base_url('assets/findit/') ?>js/jquery.appear.min.js"></script>
    <script src="<?= base_url('assets/findit/') ?>js/jquery.incremental-counter.js"></script>
    <script src="<?= base_url('assets/findit/') ?>js/script.js"></script>
</body>

</html>