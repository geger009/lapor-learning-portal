<?php

require 'includes/url.php';
require 'includes/auth.php';
require 'includes/sessions.php';

session_start();

if ( ! isLoggedIn() ) {
    redirect('/login.php');
}

if (!isset($_GET) && ($_GET['id'] <= 0)) {
    redirect('/home.php');
}

$user = getUsername();

$id = intval($_GET['id']);

$learningLink = '';
$videoLink = '';

if (($id == 0) || ($id >= 5 && $id <= 8) || ($id >= 10 && $id <= 13)) {
	$learningLink = '<a class="lp-red-text" href="player.php?id=' . $id .'&type=1">E-Learning</a>';
	$videoLink = '<a class="lp-red-text" href="player.php?id=' . $id .'&type=2">Video</a>';
} else {
	$learningLink = '<a class="lp-yellow-text" href="player.php?id=' . $id .'&type=1">E-Learning</a>';
	$videoLink = '<a class="lp-yellow-text" href="player.php?id=' . $id .'&type=2">Video</a>';
}

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

    <?php if (($id == 0) || ($id >= 5 && $id <= 8) || ($id >= 10 && $id <= 13)): ?>
        <body class='lp-yellow-background'>
    <?php else: ?>
        <body>
    <?php endif; ?>
		<header class='lp-header' data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='.lp-header-items-box'>
			<div class='lp-header-items-box px-4'>
                <?php if (($id == 0) || ($id >= 5 && $id <= 8) || ($id >= 10 && $id <= 13)): ?>
				    <a href="home.php"><span class="mif-cross mif-3x lp-red-text"></span></a>
                <?php else: ?>
				    <a href="home.php"><span class="mif-cross mif-3x fg-white"></span></a>
                <?php endif; ?>
			</div>
		</header>

		<div class='d-flex flex-align-center flex-justify-center w-100 h-vh-100'>
			<div class='row px-0-md px-5-sm'>
				<div class='cell'>
					<?php if($id === 0): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 30px; font-weight: bold;">Pendahuluan</span>
							</div>
						</div>
					<?php elseif($id === 1): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-01.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Pengelola LAPOR</span>
							</div>
						</div>
					<?php elseif($id === 2): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-02.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Verifikasi Laporan</span>
							</div>
						</div>
					<?php elseif($id === 3): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-03.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Lempar Laporan</span>
							</div>
						</div>
					<?php elseif($id === 4): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-04.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Tunda & Konfirmasi Laporan</span>
							</div>
						</div>
					<?php elseif($id === 5): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 36px; font-weight: bold;">TINDAK LANJUT LAPORAN</span>
							</div>
						</div>
					<?php elseif($id === 6): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 28px; font-weight: bold;">Terima atau tolak permintaan intansi dibawahnya</span>
							</div>
						</div>
					<?php elseif($id === 7): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 32px; font-weight: bold;">"PERMINTAAN BUKAN WEWENANG"</span>
							</div>
						</div>
					<?php elseif($id === 8): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 36px; font-weight: bold;">TAHAN DAN LEPAS LAPORAN</span>
							</div>
						</div>
					<?php elseif($id === 9): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-05.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Arsipkan Laporan</span>
							</div>
						</div>
					<?php elseif($id === 10): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 46px; font-weight: bold;">Teruskan Laporan</span>
							</div>
						</div>
					<?php elseif($id === 11): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 36px; font-weight: bold;">Tutup & Buka Laporan</span>
							</div>
						</div>
					<?php elseif($id === 12): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 36px; font-weight: bold;">Akses Data Statistik</span>
							</div>
						</div>
					<?php elseif($id === 13): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-100 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="lp-red-text" style="font-family: 'Roboto'; font-size: 36px; font-weight: bold;">Unduh Data Laporan (Reporting)</span>
							</div>
						</div>
					<?php elseif($id === 14): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-06.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Buat Laporan Manual</span>
							</div>
						</div>
					<?php elseif($id === 15): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-07.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Buat Laporan dari Twitter</span>
							</div>
						</div>
					<?php elseif($id === 16): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-08.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Manajemen Pengguna</span>
							</div>
						</div>
					<?php elseif($id === 17): ?>
						<div class='lp-squere-250 lp-border-player'>
							<div class="w-100 h-75 d-flex flex-align-center flex-justify-center">
								<img src="images/icn-09.png" class="h-75">
							</div>
							<div class="w-100 h-25 px-2 py-1 d-flex flex-align-center flex-justify-center">
								<span class="fg-white" style="font-family: 'Roboto'; font-size: 24px;">Manajemen Instansi</span>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class='cell'>
					<div class='lp-squere-250 d-flex flex-align-center'>
						<div data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='p'>
							<p class='p-2' style="font-family: 'Roboto'; font-size: 42px;">
								<?= $learningLink ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="js/jquery-3.3.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/metro.min.js"></script>
	</body>
</html>