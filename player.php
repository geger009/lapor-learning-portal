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
	0 => ["Pendahuluan", 0],
	["Pengelola LAPOR!", 1],
	["Verifikasi Laporan", 2],
	["Lempar Laporan", 3],
	["Tunda dan Konfirmasi Laporan", 4],
	["Tindak Lanjut Laporan", 6],
	["Terima atau tolak permintaan intansi dibawahnya", 11],
	["Permintaan Bukan Wewenang", 8],
	["Tahan dan Lepas Laporan", 9],
	["Arsipkan Laporan", 5],
	["Teruskan Laporan", 7],
	["Tutup dan Buka Laporan", 10],
	["Akses Data Statistik", 15],
	["Unduh Data Laporan (Reporting)", 14],
	["Buat Laporan Manual", 12],
	["Buat Laporan dari Twitter", 13],
	["Manajemen Pengguna", 16],
	["Manajemen Instansi", 17]
);

if ($type == 1) {
    $frame = '<iframe src="content/el/mod_' . $titles[$id][1] . '/index.html" scrolling="no" id="frmContent" class="w-100 h-100 border-none"></iframe>';
} else if ($type == 2) {
    $frame = '<iframe src="content/vd/mod_' . $titles[$id][1] . '/index.html" scrolling="no" id="frmContent" class="w-100 h-100 border-none"></iframe>';
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
    <body class="bg-white w-vw-100 h-vh-100" style="overflow: hidden;">
		<header id="lp-header-obj" class='lp-header op-black'>
			<p class='h-100 d-flex flex-align-center' data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='#lp-back-arrow'>
				<span id='lp-back-arrow' class='pr-4 pl-3 h-100 d-flex flex-align-center'><?= $backLink ?></span>
				<span class='fg-white text-ellipsis mr-2' style="font-family: 'Roboto'; font-size: 20px;"><?= $titles[$id][0] ?></span>
			</p>
		</header>

		<div id='lp-btn-header-left'></div>
		<div id='lp-btn-header-right'></div>

		<!-- <div id='lp-btn-header' class='op-black px-3 d-flex flex-align-center' data-role='ripple' data-ripple-color='#ffffff' data-ripple-target='span'>
			<span class="mif-chevron-thin-down mif-3x fg-white"></span>
		</div> -->

		<?= $frame ?>

        <!-- jQuery -->
        <script src="js/jquery-3.3.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/metro.min.js"></script>
		<!-- Custom Script -->
        <script src="js/player.min.js"></script>
    </body>
</html>