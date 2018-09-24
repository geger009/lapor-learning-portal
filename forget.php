<?php

require 'includes/url.php';
require 'includes/auth.php';

session_start();

$error = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['resetnik']) || empty($_POST['resetemail'])) {
        $error = 1;

    } else {
        $tmpnik = $_POST['resetnik'];
        $tmpemail = $_POST['resetemail'];
        $tmppass = $_POST['resetpass'];
        
        $error = resetPassword($tmpnik, $tmpemail, $tmppass);

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
							<p>PANDUAN LAPOR</p>
						</div>
					</div>
					<div class='cell-sm-4'>
						<div class='lp-form-error-box '>
                            <p><b>Enter your NIK and email address. We will send the new password to your email.</b></p>
						    <?php if ($error == 1): ?>
								<p>All field must be filled.</p>
						    <?php elseif ($error == 2): ?>
								<p>NIK and Email doesn't match.</p>
                            <?php elseif ($error == 99): ?>
                                <p>There is something wrong when checking data. Please try again later.</p>
						    <?php elseif ($error == 0): ?>
                                <p>New password has been sent to your email.</p>
                                <p>Please check your inbox / spam folder.</p>
						    <?php endif; ?>
                        </div>
						<form class='lp-form' method=post data-role='ripple' data-ripple-color='#C0312B' data-ripple-target='button'>
							<input data-role="input" class="lp-form-input" name="resetnik" placeholder="NIK" type="text">
							<input data-role="input" class="lp-form-input" name="resetemail" placeholder="Email" type="email">
							<input data-role="input" class="lp-form-input" name="resetpass" placeholder="New Password" type="password">
							<button class="lp-button-large" type="submit">Reset</button>
						</form>
						<p class='lp-form-link-page' style="font-size: 12px;"><a href='login.php'>Back to login page.</a></p>
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