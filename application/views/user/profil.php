<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url('assets/img/logo.png'); ?>" rel="shortcut icon">
    <link href='https://fonts.googleapis.com/css?family=Radio Canada' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-DSyw7SKW7jtcqOAr"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>

    <style>
        body {
            margin: 0px;
            font-family: 'Radio Canada';
            background-color: #FFFFFF;
        }

        .header {
            width: 100%;
            height: 210px;
            background-color: #FFFFFF;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            position: fixed;
            top: 0px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            z-index: 100;
            text-align: center;
        }

        .header1 {
            width: 100%;
            height: 320px;
        }

        .header2 {
            width: 100%;
            height: 220px;
        }

        .box1 {
            margin-top: 50px;
            width: 100%;
            height: 110px;
            display: flex;
            overflow: auto;
            margin-right: auto;
            margin-left: auto;
            background-image: linear-gradient(to right, #F1912C, #5100FD);
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .box2 {
            position: relative;
            left: 5%;
            width: 70%;
            flex-shrink: 0;
            margin: 5px;
            text-align: left;
        }

        .pembungkus {
            top: 50px;
            position: relative;
        }
    </style>

    <body>

        <!--Header-->
        <div class="header">
            <div class="pembungkus">
                <?php
                if ($user['status_pengguna'] == '1') { ?>
                    <img src="<?= base_url('assets/'); ?>img/icon.png"><?php
                                                                    } else { ?>
                    <img src="<?= base_url('assets/'); ?>img/icon2.png"><?php
                                                                    }
                                                                        ?>

            </div>
            <a type="text" style="font-size: 12px;font-weight: bold;position: relative;top: 20px;color: white;">
                <?php
                if ($user['status_pengguna'] == '1') {
                    echo "Akun Gratis";
                } else {
                    echo "Akun Pro";
                }
                ?>
            </a><br>
            <a type="text" style="font-size: 14px;font-weight: bold;position: relative;top: 35px;">
                <?= $user['nama_lengkap']; ?>
            </a><?php
                if ($user['status_pengguna'] == '1') { ?>
                <form id="payment-form" method="post" action="<?= site_url() ?>profil/finish">
                    <input type="hidden" name="result_type" id="result-type" value="" />
                    <input type="hidden" name="result_data" id="result-data" value="" />
                </form>
                <div class='box1'>
                    <div class='box2'>
                        <p style='font-size: 14px;font-weight: bold;color: white;'>
                            Dapatkan hasil maksimal dari Uwangku dengan berlangganan
                        </p>
                        <button id="pay-button" style='width: 160px;height: 27px;border-style: groove;border-radius:10px;background-color: #DBFF00;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'><!--Masukan Link pada bagian href-->
                            <p style='font-size: 14px;color: black;font-weight:bold'>
                                Dapatkan sekarang
                            </p>
                        </button>
                    </div>
                    <p style='font-size: 45px;font-weight: bold;color: #DBFF00;text-align:right;position: absolute;right: 5%;'>
                        - 50%
                    </p>
                </div>

                <script type="text/javascript">
                    $('#pay-button').click(function(event) {
                        event.preventDefault();
                        $(this).attr("disabled", "disabled");

                        $.ajax({
                            url: '<?= site_url() ?>profil/token',
                            cache: false,

                            success: function(data) {
                                //location = data;

                                console.log('token = ' + data);

                                var resultType = document.getElementById('result-type');
                                var resultData = document.getElementById('result-data');

                                function changeResult(type, data) {
                                    $("#result-type").val(type);
                                    $("#result-data").val(JSON.stringify(data));
                                    //resultType.innerHTML = type;
                                    //resultData.innerHTML = JSON.stringify(data);
                                }

                                snap.pay(data, {

                                    onSuccess: function(result) {
                                        changeResult('success', result);
                                        console.log(result.status_message);
                                        console.log(result);
                                        $("#payment-form").submit();
                                    },
                                    onPending: function(result) {
                                        changeResult('pending', result);
                                        console.log(result.status_message);
                                        $("#payment-form").submit();
                                    },
                                    onError: function(result) {
                                        changeResult('error', result);
                                        console.log(result.status_message);
                                        $("#payment-form").submit();
                                    }
                                });
                            }
                        });
                    });
                </script>

            <?php
                }
            ?>
        </div>
        <?php
        if ($user['status_pengguna'] == '1') {
            echo "<div class='header1'></div>";
        } else {
            echo "<div class='header2'></div>";
        }; ?>

        <!--Money-->

        <style>
            .money1 {
                width: 90%;
                height: 80px;
                background-color: #FFFFFF;
                margin-right: auto;
                margin-left: auto;
                margin-top: 20px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                border-radius: 10px;
            }

            .money2 {
                width: 50%;
                height: 80px;
                float: left;
            }

            .money3 {
                width: 85%;
                height: 65px;
                background-color: transparent;
                margin-right: auto;
                margin-left: auto;
                border-radius: 10px;
            }

            .iklan1 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                margin-top: 20px;
            }

            .iklan2 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                border-radius: 10px;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            }

            .pilihan1 {
                width: 100%;
                border-bottom-right-radius: 10px;
                border-bottom-left-radius: 10px;
                display: flex;
                overflow: auto;
                margin-right: auto;
                margin-left: auto;
                background-color: #E8EEF0;
                height: 42px;
            }

            .pilihan2 {
                width: 47.5%;
                flex-shrink: 0;
                margin-right: auto;
                margin-left: auto;
                margin-top: 5px;
                margin-bottom: 5px;
                background-color: #FFFFFF;
                border-radius: 10px;
                text-align: center;
                height: 25px;
            }

            .box_laporan {
                margin-top: 20px;
                width: 90%;
                background-color: transparent;
                margin-right: auto;
                margin-left: auto;
            }

            .laporan {
                width: 90%;
                margin-right: 0;
                margin-left: 0;
                margin-bottom: 10px;
                display: flex;
            }

            .detail_laporan {
                margin: 0px;
                padding: 0px;
            }

            .rightt {
                position: absolute;
                right: 10%;
                text-align: right;
            }

            .iklan3 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                margin-top: 40px;
            }

            .iklan4 {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
                border-radius: 10px;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            }
        </style>

        <div class="box_laporan" onclick="window.location.href='<?= site_url('profil/profil'); ?>'">
            <div class="laporan">
                <img src="<?= base_url('assets/'); ?>img/akun1.png" style="width: 20px;height: 20px;">
                <a type="text" style="font-size: 14px;font-weight: regular;margin-left: 10px;">
                    Profil
                </a>
                <img src="<?= base_url('assets/'); ?>img/right1.png" style="position: relative;width: 20px;height: 20px;position: absolute;right: 7%;">
            </div>
        </div>
        <div class="box_laporan" onclick="window.location.href='<?= site_url('profil/bantuan'); ?>'">
            <div class="laporan">
                <img src="<?= base_url('assets/'); ?>img/bantuan1.png" style="width: 20px;height: 20px;">
                <a type="text" style="font-size: 14px;font-weight: regular;margin-left: 10px;">
                    Bantuan
                </a>
                <img src="<?= base_url('assets/'); ?>img/right1.png" style="position: relative;width: 20px;height: 20px;position: absolute;right: 7%;">
            </div>
        </div>
        <div class="box_laporan" onclick="window.location.href='<?= site_url('profil/tentang'); ?>'">
            <div class="laporan">
                <img src="<?= base_url('assets/'); ?>img/tentang.png" style="width: 20px;height: 20px;">
                <a type="text" style="font-size: 14px;font-weight: regular;margin-left: 10px;">
                    Tentang
                </a>
                <img src="<?= base_url('assets/'); ?>img/right1.png" style="position: relative;width: 20px;height: 20px;position: absolute;right: 7%;">
            </div>
        </div>
        <div class="box_laporan" onclick="window.location.href='<?= site_url('dashboard/logout'); ?>'">
            <div class="laporan">
                <img src="<?= base_url('assets/'); ?>img/logout.png" style="width: 20px;height: 20px;">
                <a type="text" style="font-size: 14px;font-weight: regular;margin-left: 10px;">
                    Logout
                </a>
                <img src="<?= base_url('assets/'); ?>img/right1.png" style="position: relative;width: 20px;height: 20px;position: absolute;right: 7%;">
            </div>
        </div>

        <!--Footer-->

        <style>
            .footer1 {
                width: 100%;
                height: 7%;
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
                            <img src="<?= base_url('assets/') ?>img/home1.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
                            <p style="font-size: 12px;color: black;">
                                Beranda
                            </p>
                        </button>
                    </div>
                    <div class="col">
                        <button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('transaksi'); ?>'"><!--Masukan Link pada bagian href-->
                            <img src="<?= base_url('assets/') ?>img/transaksi1.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
                            <p style="font-size: 12px;color: black;">
                                Transaksi
                            </p>
                        </button>
                    </div>
                    <div class="col">
                        <button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('anggaran'); ?>'"><!--Masukan Link pada bagian href-->
                            <img src="<?= base_url('assets/') ?>img/anggaran1.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
                            <p style="font-size: 12px;color: black;">
                                Anggaran
                            </p>
                        </button>
                    </div>
                    <div class="col">
                        <button style="width: 100%;height: 60px;border-style: none;background-color: transparent;" onclick="window.location.href='<?= site_url('profil'); ?>'"><!--Masukan Link pada bagian href-->
                            <img src="<?= base_url('assets/') ?>img/akun.png" style="width: 25px;height: 25px;"><!--Ganti Icon pada bagian src-->
                            <p style="font-size: 12px;color: black;">
                                Profil
                            </p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer2"></div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>