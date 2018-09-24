<?php

function getConn() {
    $db_host = 'localhost';
    $db_name = 'lapor_db';
    $db_user = 'root';
    $db_pass = '';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {
        return null;
    }

    return $conn;
}
