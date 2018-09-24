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
$type = intval($_GET['type']);

$titles = array(
	1 => "Pengelola LAPOR",
	"Verifikasi Laporan",
	"Lempar Laporan",
	"Tunda & Konfirmasi Laporan",
	"TINDAK LANJUT LAPORAN",
	"Terima atau tolak permintaan intansi dibawahnya",
	"\"PERMINTAAN BUKAN WEWENANG\"",
	"TAHAN DAN LEPAS LAPORAN",
	"Arsipkan Laporan",
	"Teruskan Laporan",
	"Tutup & Buka Laporan",
	"Akses Data Statistik",
	"Unduh Data Laporan (Reporting)",
	"Buat Laporan Manual",
	"Buat Laporan dari Twitter",
	"Manajemen Pengguna",
	"Manajemen Instansi"
);

if ($type == 1) {
    $frame = '<iframe src="content/el/mod_' . $id . '/index.html" scrolling="no" id="frmContent" class="w-100 h-100 border-none"></iframe>';
} else if ($type == 2) {
    $frame = '<iframe src="content/vd/mod_' . $id . '/index.html" scrolling="no" id="frmContent" class="w-100 h-100 border-none"></iframe>';
}

$backLink = '<a href="modul.php?id=' . $id . '"><span class="mif-chevron-thin-left mif-3x fg-white"></span></a>';

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
    <body class="bg-white w-vw-100 h-vh-100">
		<header id="lp-header-obj" class='lp-header op-black'>
			<p class='h-100 d-flex flex-align-center' data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='#lp-back-arrow'>
				<span id='lp-back-arrow' class='pr-4 pl-3 h-100 d-flex flex-align-center'><?= $backLink ?></span>
				<span class='fg-white text-ellipsis mr-2' style="font-family: 'Roboto'; font-size: 20px;"><?= $titles[$id] ?></span>
			</p>
		</header>

		<div id='lp-btn-header' class='op-black px-3 d-flex flex-align-center' data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='span'>
			<span class="mif-chevron-thin-down mif-3x fg-white"></span>
		</div>

		<?= $frame ?>

        <!-- jQuery -->
        <script src="js/jquery-3.3.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/metro.min.js"></script>
		<!-- Custom Script -->
        <script src="js/player.min.js"></script>
    </body>
</html>