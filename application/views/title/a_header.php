<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?= base_url('assets/img/logo.png');?>" rel="shortcut icon">
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
			height: 75px;
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
			height: 75px;
		}

		.box1 {
            margin-top: 10px;
			width: 100%;
			display: flex;
			overflow: auto;
			margin-right: auto;
			margin-left: auto;
			font-size: 12px;
			font-weight: bold;
			text-align: center;
		}

		.box2 {
			width: 65px;
			float: left;
			flex-shrink: 0;
			margin: 5px;
			text-align: center;
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
			</a>
		</div>
		<div class="header1"></div>