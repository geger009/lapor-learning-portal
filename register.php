<?php

require 'includes/url.php';
require 'includes/auth.php';

session_start();

$error = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['regisuser']) || empty($_POST['regisnik']) || empty($_POST['regispass']) || empty($_POST['regisemail'])) {
        $error = 1;

    } else {

	    $tmpuser = $_POST['regisuser'];
	    $tmpnik = $_POST['regisnik'];
	    $tmppass = $_POST['regispass'];
        $tmpemail = $_POST['regisemail'];

        if ( preg_match('/\s/',$tmpuser) ) {
            $error = 22;

        } else if ( preg_match('/\s/',$tmpnik) ) {
            $error = 33;

        } else if ( preg_match('/\s/',$tmpemail) ) {
            $error = 44;

        } else if ( preg_match('/\s/',$tmppass) ) {
            $error = 5;

        } else {
            $error = registerUser($tmpuser, $tmpnik, $tmpemail, $tmppass);
            
        }
    
    }

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
	<body>
		<div class='lp-form-container'>
			<div class='lp-form-box'>
				<div class='row'>
					<div class='cell-sm-8'>
						<div class='lp-title-box d-flex flex-align-center'>
							<p>PANDUAN LAPOR!</p>
						</div>
					</div>
					<div class='cell-sm-4'>
						<?php if ($error == 1): ?>
							<div class='lp-form-error-box'>
								<p>All field must be filled.</p>
							</div>
                        <?php elseif ($error == 2): ?>
							<div class='lp-form-error-box'>
								<p>Username is already exist.</p>
							</div>
                        <?php elseif ($error == 22): ?>
							<div class='lp-form-error-box'>
								<p>Username cannot contain spaces.</p>
							</div>
                        <?php elseif ($error == 3): ?>
							<div class='lp-form-error-box'>
								<p>NIK is already exist.</p>
							</div>
                        <?php elseif ($error == 33): ?>
							<div class='lp-form-error-box'>
								<p>NIK cannot contain spaces.</p>
							</div>
                        <?php elseif ($error == 4): ?>
							<div class='lp-form-error-box'>
								<p>Email is already exist.</p>
							</div>
                        <?php elseif ($error == 44): ?>
							<div class='lp-form-error-box'>
								<p>Email cannot contain spaces.</p>
							</div>
                        <?php elseif ($error == 5): ?>
							<div class='lp-form-error-box'>
								<p>Password cannot contain spaces.</p>
							</div>
                        <?php elseif ($error == 99): ?>
							<div class='lp-form-error-box'>
								<p>There is something wrong when storing data. Please try again later.</p>
							</div>
                        <?php elseif ($error == 0): ?>
							<div class='lp-form-error-box'>
								<p>Registration is successful, please <a href='login.php'>Login</a>.</p>
							</div>
						<?php endif; ?>
						<p class='lp-form-link-page'>or <a href='login.php'>Login</a></p>
						<form class='lp-form' method=post data-role='ripple' data-ripple-color='#C0312B' data-ripple-target='button'>
							<input data-role="input" class="lp-form-input" name="regisuser" placeholder="Username" type="text">
							<input data-role="input" class="lp-form-input" name="regisnik" placeholder="NIK" type="text">
							<input data-role="input" class="lp-form-input" name="regisemail" placeholder="Email" type="email">
							<input data-role="input" class="lp-form-input" name="regispass" placeholder="Password" type="password">
							<button class="lp-button-large" type="submit">Register</button>
						</form>
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