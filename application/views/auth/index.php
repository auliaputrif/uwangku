<!DOCTYPE html>
<html lang="en">
<title>Uwangku</title>

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>digitalex</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link href="<?= base_url('assets/img/logo.png'); ?>" rel="shortcut icon">

   <!-- bootstrap css -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="<?= base_url('assets/') ?>images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="<?= base_url('assets/') ?>css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- header -->
   <header>
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header inner -->
      <div class="header" id="header">
         <div class="white_bg">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <img style="height:50px" src="<?= base_url('assets/') ?>images/logo2.png" />
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="<?= base_url('#header') ?>">Beranda</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?= base_url('#about') ?>">Tentang</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?= base_url('#servies') ?>">Layanan </a>
                              </li>
                              <li class="nav-item d_none le_co">
                                 <a class="nav-link" href="<?= site_url('auth') ?>"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <section class="banner_main">
               <div id="banner1" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#banner1" data-slide-to="0" class="active"></li>
                     <li data-target="#banner1" data-slide-to="1"></li>
                     <li data-target="#banner1" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="container-fluid">
                           <div class="carousel-caption">
                              <div class="row">
                                 <div class="col-md-12 col-lg-7">
                                    <div class="text-bg">
                                       <span>Kemajuan & Kesuksesan</span>
                                       <h1>Mata Uang</h1>
                                       <p>Sudah menjadi fakta lama bahwa perhatian pembaca akan teralihkan oleh apa yang dibacanya Sudah menjadi fakta lama bahwa pembaca akan teralihkan oleh apa yang dibacanya </p>
                                       <a class="read_more" href="auth"><img src="<?= base_url('assets/') ?>images/btn_h.png" /> Coba Sekarang</a>
                                    </div>
                                 </div>
                                 <div class="col-md-12 col-lg-5">
                                    <div class="text_img">
                                       <figure><img src="<?= base_url('assets/') ?>images/ak1.jpg" alt="#" /></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="container-fluid">
                           <div class="carousel-caption">
                              <div class="row">
                                 <div class="col-md-12 col-lg-7">
                                    <div class="text-bg">
                                       <span>Progress & Success</span>
                                       <h1>c u r r e n c y</h1>
                                       <p>It is a long established fact that a reader will be distracted by the readable It is a long established fact that a reader will be distracted by the readable </p>
                                       <a class="read_more" href="auth"><img src="<?= base_url('assets/') ?>images/btn_h.png" alt="#" /> Try Now</a>
                                    </div>
                                 </div>
                                 <div class="col-md-12 col-lg-5">
                                    <div class="text_img">
                                       <figure><img src="<?= base_url('assets/') ?>images/ak2.jpg" alt="#" /></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
                     <i class="fa fa-chevron-left" aria-hidden="true"></i>
                  </a>
                  <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
                     <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
               </div>
            </section>
         </div>
      </div>
   </header>
   <!-- end banner -->
   <!-- about section -->
   <div class="about" id="about">
      <div class="container">
         <div class="row d_flex">
            <div class="col-md-12 col-lg-5">
               <div class="about_img">
                  <figure><img src="<?= base_url('assets/') ?>images/about.png" alt="#" /></figure>
               </div>
            </div>
            <div class="col-md-12 col-lg-7">
               <div class="titlepage">
                  <h2> <span class="yellow">Tentang Kami</span><br>Selamat datang di Uwangku</h2>
                  <p>Sistem pengolaan uang pribadi berbasis website yang kami buat ini dapat membantu
                     pengguna dalam melakukan pengolaan keuangan pribadinya. Dengan sistem ini, pengguna
                     dapat dengan mudah belajar mengelola keuangan secara mandiri melalui gadgetnya masing-masing</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- about section -->
   <!-- services section -->
   <div class="services" id="servies">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2> <span class="yellow">Layanan</span><br>Kami Menyediakan Fitur Menarik</h2>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div id="ho_color" class="services_main">
                  <i><img style="height: 100px; weight:100px" src="<?= base_url('assets/') ?>images/plus.png" alt="#" /></i>
                  <img class="ho" style="height: 100px; weight:100px" src="<?= base_url('assets/') ?>images/plus1.png" alt="#" />
                  <h3>Pemasukan</h3>
                  <p>Mencatat semua transaksi pendapatan anda
                  </p>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div id="ho_color" class="services_main">
                  <i><img style="height: 100px; weight:100px" src="<?= base_url('assets/') ?>images/minus.png" alt="#" /></i>
                  <img class="ho" style="height: 100px; weight:100px" src="<?= base_url('assets/') ?>images/minus1.png" alt="#" />
                  <h3>Pengeluaran</h3>
                  <p>Mencatat semua transaksi pengeluaran anda
                  </p>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div id="ho_color" class="services_main">
                  <i><img style="height: 100px; weight:100px" src="<?= base_url('assets/') ?>images/transaksi.png" alt="#" /></i>
                  <img class="ho" style="height: 100px; weight:100px" src="<?= base_url('assets/') ?>images/transaksi1.png" alt="#" />
                  <h3>Laporan Keuangan</h3>
                  <p>Ringkasan laporan pengeluaran dan pemasukan
                  </p>
               </div>
            </div>
            <div class="col-md-3 col-sm-6">
               <div id="ho_color" class="services_main">
                  <i><img style="height: 100px; weight:100px" src="<?= base_url('assets/') ?>images/anggaran.png" alt="#" /></i>
                  <img class="ho" style="height: 100px; weight:100px" src="<?= base_url('assets/') ?>images/anggaran1.png" alt="#" />
                  <h3>Anggaran</h3>
                  <p>Batas pengeluaran anda dalam periode tertentu
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end services section -->
   <!-- Javascript files-->
   <script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
   <script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
   <script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>
   <script src="<?= base_url('assets/') ?>js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="<?= base_url('assets/') ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="<?= base_url('assets/') ?>js/custom.js"></script>
</body>

</html>