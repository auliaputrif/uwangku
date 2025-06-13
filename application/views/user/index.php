<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari toko ..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama_lengkap']; ?></span>
                        <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= site_url("dashboard/logout") ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!--Footer-->

    <style>
        .footer1 {
            width: 100%;
            height: 60px;
            background-color: #FFFFFF;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            position: fixed;
            bottom: 0px;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;

        }

        .footer2 {
            width: 100%;
            height: 70px;
        }
    </style>

    <div class="footer1">
        <div class="container text-center">
            <div class="row row-cols-4">
                <div class="col">
                    <button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('dashboard'); ?>'"><!--Masukan Link pada bagian href-->
                        <img src="<?= base_url('assets/') ?>img/home1.png" style="width: 30px;height: 30px;"><!--Ganti Icon pada bagian src-->
                        <p style="font-size: 14px;color: black;">
                            Beranda
                        </p>
                    </button>
                </div>
                <div class="col">
                    <button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('transaksi'); ?>'"><!--Masukan Link pada bagian href-->
                        <img src="<?= base_url('assets/') ?>img/transaksi.png" style="width: 30px;height: 30px;"><!--Ganti Icon pada bagian src-->
                        <p style="font-size: 14px;color: black;">
                            Transaksi
                        </p>
                    </button>
                </div>
                <div class="col">
                    <button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='#'"><!--Masukan Link pada bagian href-->
                        <img src="<?= base_url('assets/') ?>img/anggaran1.png" style="width: 30px;height: 30px;"><!--Ganti Icon pada bagian src-->
                        <p style="font-size: 14px;color: black;">
                            Anggaran
                        </p>
                    </button>
                </div>
                <div class="col">
                    <button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='#'"><!--Masukan Link pada bagian href-->
                        <img src="<?= base_url('assets/') ?>img/akun1.png" style="width: 30px;height: 30px;"><!--Ganti Icon pada bagian src-->
                        <p style="font-size: 14px;color: black;">
                            Akun
                        </p>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer2"></div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>