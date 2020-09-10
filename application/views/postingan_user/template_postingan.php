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
                        <li class="dropdown"><a href="<?= base_url('template_pesan') ?>">Hubungi Kami</a></li>
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

                <!-- Newsfeed Common Side Bar Left
          ================================================= -->
                <div class="col-md-3 static">
                    <div class="profile-card">
                        <h2><a href="#" class="text-white"><?= $this->session->userdata('nama'); ?></a></h2>
                    </div>
                    <!--profile card ends-->
                    <ul class="nav-news-feed">
                        <li><i class="icon ion-ios-paper"></i>
                            <div><a href="#">Buat Laporan ke Polisi</a></div>
                        </li>
                        <li><i class="icon ion-ios-paper"></i>
                            <div><a href="#">Posting</a></div>
                        </li>
                    </ul>
                    <!--news-feed links ends-->
                </div>
                <div class="col-md-7">
                    <!-- Post Create Box
              ================================================= -->
                    <div class="create-post">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <p>Saling tolong menolong akan membuat segala masalah berat menjadi ringan. Cari dan Temukan barang berhargamu bersama orang orang baik di sekitarmu. Mari peduli sesama bersama FindIt.</p>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="tools">
                                    <button class="btn btn-primary pull-right" onclick="loadMenu('<?= base_url('postingan_user') ?>')">Yuk Lihat Postingan</button>
                                    <br><br><br>
                                    <button class="btn btn-primary pull-right" onclick="loadMenu('<?= base_url('postingan_user/form_create') ?>')"> Buat Postingan </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-post">
                        <div class="row">
                            <div class="">
                                <ol type:'1'>
                                    <div class="form-group">
                                        <p>Berikut ini sekilas tata cara posting Kehilangan Barang pada pihak Kepolisian yang mungkin anda perlu ketahui.</p> <br>
                                    </div>
                                    <li>
                                        <div class="form-group">
                                            <p>Deskripsikan barang anda yang hilang.</p> <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <p> Kemudian lampirkan foto barang anda yang hilang.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <p> Lalu unggah laporan dan tunggu proses selanjutnya.</p>
                                        </div>
                                    </li>

                                </ol>

                            </div>
                        </div>
                    </div>



                    <!-- Post Create Box End-->


                    <!-- Post Content
              ================================================= -->

                    <div class="post-content">

                        <div class="post-container">
                            <div class="post-detail" id="kontenHTML">

                            </div>
                        </div>
                    </div>
                    <!-- Post Content
              ================================================= -->

                </div>

                <!-- Newsfeed Common Side Bar Right
          ================================================= -->
                <div class="col-md-2 static">
                    <div class="suggestions" id="sticky-sidebar">
                        <h4 class="grey">Daftar kantor polisi dan nomor telepon </h4>
                        <ul>
                            <div>
                                <li>
                                    <h5><a href="#">Polres Berbah</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 496509</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Cangkringan</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 7100075</a>
                            </div>

                            <div>
                                <li>
                                    <h5><a href="#">Polsek Depok Timur</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 881557</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Depok Barat</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 487666</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Gamping</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 797110</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Godean</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 797110</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Kalasan</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 496110</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Minggir</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 2820935</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Mlati</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 869410</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Moyudan</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 6497080</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Ngemplak</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 4461036</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Pakem</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 895110</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Prambanan</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 496593</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Sayegan</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 794454</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Sleman</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 868559</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Tempel</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 896110</a>
                            </div>
                            <div>
                                <li>
                                    <h5><a href="#">Polsek Turi</a></h5>
                                </li>
                                <a href="#" class="text-green">Telp: (0274) 986705</a>
                            </div>
                        </ul>


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
        function loadMenu(url) {
            $.ajax(url, {
                type: 'GET',
                success: function(data, status, xhr) {
                    var objData = JSON.parse(data)

                    $('#kontenHTML').html(objData.konten);
                    $('title').html(objData.title);

                },
                error: function(jqXHR, textStatus, errorMsg) {
                    alert('Error: ' + errorMsg);
                }
            })
        }
    </script>
</body>

</html>