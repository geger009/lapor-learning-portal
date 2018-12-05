<?php

require 'includes/url.php';
require 'includes/auth.php';
require 'includes/sessions.php';

session_start();

if ( ! isLoggedIn() ) {
    redirect('/login.php');
}

$user = getUsername();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>LAPOR! Portal</title>

		<!-- Bootstrap -->
		<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet"> -->

		<!-- MetroUI -->
		<link href="css/metro-all.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Custom Styling -->
		<link href="css/main.min.css" rel="stylesheet">

	</head>
	<body class="lp-white">
		<header class='lp-header'>
			<div class='lp-header-items-box' data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='a'>
				<a href="logout.php"><button class="lp-button-100">Logout</button></a>
			</div>
			<div class='lp-header-items-box'>
				<p class='lp-greet-text'>Welcome! <?= $user; ?></p>
			</div>
		</header>
		<div id='lp-top' class='lp-top-container'>
			<div class='lp-top-box'>
				<p>PANDUAN LAPOR!</p>
				<div class="row">
					<div class="cell-sm-4">
						<div class="lp-welcome-box">
							<p>Selamat datang di<br>Portal E-Learning LAPOR!</p>
						</div>
					</div>
					<div class="cell-sm-8">
						<div class="lp-description-box">
						<p>Portal E-Learning LAPOR! menyediakan modul-modul pembelajaran bagi Admin Instansi dan Pejabat Penghubung mengenai cara mengelola laporan masyarakat pada sistem LAPOR!.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id='lp-bottom' class='lp-bottom-container'>
			<div class='lp-container'>
				<div class='lp-bottom-title'>
					<p>MODUL-MODUL PEMBELAJARAN</p>
				</div>
				<div class='lp-bottom-menu-container'>
					<div class='tiles-grid size-fs-2 size-sm-3 size-md-5 mx-auto' data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='a'>
						<a href="modul.php?id=0" data-role="tile" class="lp-white-background lp-red-text" data-size="medium">
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 20px; font-weight: bold;">Pendahuluan</span>
							</div>
						</a>
						<a href="modul.php?id=1" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-01.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Pengelola LAPOR!</span>
							</div>
						</a>
						<a href="modul.php?id=2" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-02.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Verifikasi Laporan</span>
							</div>
						</a>
						<a href="modul.php?id=3" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-03.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Lempar Laporan</span>
							</div>
						</a>
						<a href="modul.php?id=4" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-04.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Tunda dan Konfirmasi Laporan</span>
							</div>
						</a>
						<a href="modul.php?id=5" data-role="tile" class="lp-white-background lp-red-text" data-size="medium">
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 24px; font-weight: bold;">Tindak Lanjut Laporan</span>
							</div>
						</a>
						<a href="modul.php?id=6" data-role="tile" class="lp-white-background lp-red-text" data-size="medium">
							<div class="w-100 h-100 px-3 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 18px; font-weight: bold;">Terima atau tolak permintaan intansi dibawahnya</span>
							</div>
						</a>
						<a href="modul.php?id=7" data-role="tile" class="lp-white-background lp-red-text" data-size="medium">
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 18px; font-weight: bold;">Permintaan Bukan Wewenang</span>
							</div>
						</a>
						<a href="modul.php?id=8" data-role="tile" class="lp-white-background lp-red-text" data-size="medium">
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 18px; font-weight: bold;">Tahan dan Lepas Laporan</span>
							</div>
						</a>
						<a href="modul.php?id=9" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-05.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Arsipkan Laporan</span>
							</div>
						</a>
						<a href="modul.php?id=10" data-role="tile" class="lp-white-background lp-red-text" data-size="small">
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 11px;">Teruskan Laporan</span>
							</div>
						</a>
						<a href="modul.php?id=11" data-role="tile" class="lp-white-background lp-red-text" data-size="small">
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 11px;">Tutup dan Buka Laporan</span>
							</div>
						</a>
						<a href="modul.php?id=12" data-role="tile" class="lp-white-background lp-red-text col-md-1 row-md-6" data-size="small">
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 11px;">Akses Data Statistik</span>
							</div>
						</a>
						<a href="modul.php?id=13" data-role="tile" class="lp-white-background lp-red-text col-md-2 row-md-6" data-size="small">
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 11px;">Unduh Data Laporan (Reporting)</span>
							</div>
						</a>
						<a href="modul.php?id=14" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-06.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Buat Laporan Manual</span>
							</div>
						</a>
						<a href="modul.php?id=15" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-07.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Buat Laporan dari Twitter</span>
							</div>
						</a>
						<a href="modul.php?id=16" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-08.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Manajemen Pengguna</span>
							</div>
						</a>
						<a href="modul.php?id=17" data-role="tile" class="lp-red-background fg-white" data-size="medium">
							<div class="w-100 d-flex flex-align-center flex-justify-center" style="height: 65%;">
								<img src="images/icn-09.png" class="h-75">
							</div>
							<div class="w-100 px-2 py-1 d-flex flex-align-center flex-justify-center" style="height: 35%;">
								<span class="lp-yellow-text" style="font-family: 'Roboto'; font-size: 14px;">Manajemen Instansi</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<footer id='lp-footer-obj' class='place-right pos-fixed' style="bottom: 15px; right: 15px;" data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='a'>
			<div id='lp-link-bottom'>
				<a href="#lp-bottom" class="button cycle large lp-red-background fg-white">
					<span class="mif-chevron-thin-down"></span>
				</a>
			</div>
			<div id='lp-link-top'>
				<a href="#lp-top" class="button cycle large lp-red-background fg-white">
					<span class="mif-chevron-thin-up"></span>
				</a>
			</div>
		</footer>

		<!-- jQuery -->
		<script src="js/jquery-3.3.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/metro.min.js"></script>
		<!-- Custom Script -->
		<script src="js/main.min.js"></script>
	</body>
</html>