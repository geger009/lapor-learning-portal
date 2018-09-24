<?php

require 'includes/url.php';
require 'includes/sessions.php';

session_start();

if ( ! isLoggedIn() ) {
    redirect('/login.php');
} else {
    redirect('/home.php');
}
