<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '.classes/db.php';
require_once '.classes/funcs.php';

session_start();

if(isset($_SESSION['auth'])) {
    $auth = $_SESSION['auth'];
    if(empty($auth)) {
        header("Location: index.php");
    }

    if ($auth !== true) {
        header("Location: index.php");
    }

    $uid = $_SESSION['uid'];
    if(empty($uid)) {
        header("Location: index.php");
    }

    if (!is_numeric($uid)) {
        header("Location: index.php");
    }

    $row = retrieve_user_row_by_id($uid);
    if($row == null) {
        // Not valid login hash get out of here!
        header("Location: index.php");
    }

    $userid = $row[0];

    // in case of remember me.
    if(isset($_COOKIE['lgh'])) {
        null_login_hash($userid);
        $options = array (
            'expires' => -1, // expired, please browser remove it :)
            'path' => '/',
            'domain' => 'localhost',
            'secure' => false,     // when https enable it!!!
            'httponly' => true,    // no javascript is allowed to touch this cookie! no XSS
            'samesite' => 'Strict' // No CSRF is allowed here!
            // but i hope your browser is not too old :)
        );
        setcookie('lgh', '', $options); 
        unset($_COOKIE['lgh']);
    }

    $_SESSION['auth'] = false;
    $_SESSION['uid'] = '';

    session_destroy();

    header("Location: index.php");
} else {
    header("Location: index.php");
}

?>