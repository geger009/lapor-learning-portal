<?php

require 'database.php';

function registerUser($username, $nik, $email, $password) {
    $conn = getConn();

    $username = mysqli_escape_string($conn, $username);
    $nik = mysqli_escape_string($conn, $nik);
    $email = mysqli_escape_string($conn, $email);
    $password = mysqli_escape_string($conn, $password);

    $sqlusername = "SELECT * FROM user WHERE username = '" . $username . "'";

    $resuser = mysqli_query($conn, $sqlusername);

    if (mysqli_num_rows($resuser) !== 0) {
        mysqli_free_result($resuser);
        
        mysqli_close($conn);

        return 2;

    }

    $sqlnik = "SELECT * FROM user WHERE nik = '" . $nik . "'";

    $resnik = mysqli_query($conn, $sqlnik);

    if (mysqli_num_rows($resnik) !== 0) {
        mysqli_free_result($resnik);
        
        mysqli_close($conn);

        return 3;

    }
    
    $sqlemail = "SELECT * FROM user WHERE email = '" . $email . "'";

    $resemail = mysqli_query($conn, $sqlemail);

    if (mysqli_num_rows($resemail) !== 0) {
        mysqli_free_result($resemail);

        mysqli_close($conn);

        return 4;

    }

    $hashPassword = hash('sha512', $nik . $username . $password);

    $sql = "INSERT INTO user(username, password, nik, email) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        mysqli_close($conn);

        return 99;

    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $hashPassword, $nik, $email);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_close($conn);

            return 0;

        } else {
            mysqli_close($conn);

            return 99;

        }
    }
}

function loginUser($username, $nik, $password) {
    $conn = getConn();

    $username = mysqli_escape_string($conn, $username);
    $nik = mysqli_escape_string($conn, $nik);
    $password = mysqli_escape_string($conn, $password);

    $hashPassword = hash('sha512', $nik . $username . $password);

    $sql = "SELECT * FROM user WHERE username = '" . $username . "' AND nik = '" . $nik . "' AND password = '" . $hashPassword . "'";

    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        mysqli_free_result($result);

        mysqli_close($conn);

        return false;
    } else {

        if (mysqli_num_rows($result) !== 0) {
            $user = mysqli_fetch_assoc($result);

            mysqli_free_result($result);

            mysqli_close($conn);

            return $user;
        } else {
            mysqli_close($conn);

            return false;
        }
    }
}

function changePassword($username, $nik, $email, $password) {
    $conn = getConn();

    $username = mysqli_escape_string($conn, $username);
    $nik = mysqli_escape_string($conn, $nik);
    $email = mysqli_escape_string($conn, $email);
    $password = mysqli_escape_string($conn, $password);

    $hashPassword = hash('sha512', $nik . $username . $password);

    $sql = "UPDATE user SET password = '" . $hashPassword . "' WHERE username = '" . $username . "' AND nik = '" . $nik . "' AND email = '" . $email . "'";

    $conn = getConn();

    $result = mysqli_query($conn, $sql);
}

function resetPassword($nik, $email, $newpassword) {
    $conn = getConn();

    $nik = mysqli_escape_string($conn, $nik);
    $email = mysqli_escape_string($conn, $email);

    $sql = "SELECT * FROM user WHERE nik = '" . $nik . "'";

    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        mysqli_close($conn);

        return 99;

    }

    if (mysqli_num_rows($result) === 0) {
        mysqli_free_result($result);
        
        mysqli_close($conn);

        return 2;

    }

    $user = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    if ($email != $user['email']) {
        mysqli_close($conn);

        return 2;

    } else {
        /*$_alphaSmall = 'abcdefghijklmnopqrstuvwxyz';            // small letters
        $_alphaCaps  = strtoupper($_alphaSmall);                // CAPITAL LETTERS
        $_numerics   = '1234567890';                            // numerics
        $_specialChars = '`~!@#$%^&*()-_=+]}[{;:,<.>/?\'"\|';   // Special Characters
    
        $_container = $_alphaSmall.$_alphaCaps.$_numerics.$_specialChars;   // Contains all characters
        $newpassword = '';         // will contain the desired pass
    
        for($i = 0; $i < 10; $i++) {                                 // Loop till the length mentioned
            $_rand = rand(0, strlen($_container) - 1);                  // Get Randomized Length
            $newpassword .= substr($_container, $_rand, 1);             // returns part of the string [ high tensile strength ;) ] 
        }*/

        $username = $user['username'];

        //mail user for the new password
        $email_subject = "Your Generated Password";
        $email_body = "You have been reseting your password.\n\nYour new password is : $newpassword\n\n";
        $headers = "From: noreply@lapor.go.id\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        mail($email,$email_subject,$email_body,$headers);

        $hashPassword = hash('sha512', $nik . $username . $newpassword);

        $sqlupdate = "UPDATE user SET password = '" . $hashPassword . "' WHERE username = '" . $username . "' AND nik = '" . $nik . "' AND email = '" . $email . "'";

        $resultupdate = mysqli_query($conn, $sqlupdate);

        if ($resultupdate === false) {
            return 99;

        } else {
            mysqli_close($conn);

            return 0;

        }

    }

}
