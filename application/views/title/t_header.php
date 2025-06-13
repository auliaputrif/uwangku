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
</head>

<body>

	<style>
		body {
			margin: 0px;
			font-family: 'Radio Canada';
			background-color: #E8EEF0;
		}

		.header {
			width: 100%;
			height: 110px;
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
			height: 120px;
		}

		/* Dropdown styles */
		.dropdown {
			margin-top: 10px;
			position: relative;
			display: inline-block;
			font-size: 12px;
			font-weight: 100;
		}

		.dropdown-button {
			background-color: transparent;
			/* Warna latar belakang dropdown button dengan transparansi */
			color: black;
			padding: 10px 15px;
			border: none;
			cursor: pointer;
		}

		.dropdown-content {
			font-weight: 100;
			display: none;
			position: absolute;
			background-color: #FD982E;
			border-radius: 10px;
			/* Warna latar belakang dropdown dengan transparansi */
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
			/* Efek bayangan */
			z-index: 1;
			padding: 5px;
			/* Ruang internal dropdown */
		}

		.dropdown-content a {
			color: white;
			padding: 5px 16px;
			text-decoration: none;
			display: block;
		}

		.dropdown-content a:hover {
			background-color: #555;
			border-radius: 10px;
		}

		/* Munculkan dropdown content saat mengarahkan kursor ke dropdown button */
		.dropdown:hover .dropdown-content {
			display: block;
		}
	</style>

	<body>

		<!--Header-->
		<div class="header">
			<a type="text" style="font-size: 10px;font-weight: regular;position: relative;top: 15px;">
				Saldo anda
			</a><br>
			<a type="text" style="font-size: 14px;font-weight: bold;position: relative;top: 8px;">
				<?= 'Rp ' . number_format($user['total_saldo']); ?>
			</a><br>
			<div class="dropdown">
				<button class="dropdown-button">[ Pilih Bulan ]</button>
				<div class="dropdown-content">
					<a href="<?=base_url('transaksi')?>">Bulan ini</a>
					<a href="<?=base_url('transaksi/bulan1')?>"><?=$bulan1?></a>
					<a href="<?=base_url('transaksi/bulan2')?>"><?=$bulan2?></a>
					<a href="<?=base_url('transaksi/bulan3')?>"><?=$bulan3?></a>
					<a href="<?=base_url('transaksi/bulan4')?>"><?=$bulan4?></a>
					<a href="<?=base_url('transaksi/bulan5')?>"><?=$bulan5?></a>
					<a href="<?=base_url('transaksi/bulan6')?>"><?=$bulan6?></a>
					<a href="<?=base_url('transaksi/bulan7')?>"><?=$bulan7?></a>
					<!-- Tambahkan opsi bulan lainnya sesuai kebutuhan -->
				</div>
			</div>
		</div>
		<div class="header1"></div>