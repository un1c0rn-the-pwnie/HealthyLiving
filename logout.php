<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '.classes/db.php';
require_once '.classes/funcs.php';

session_start();

if(isset($_SESSION['lgh'])) {
    $login_hash = $_SESSION['lgh'];
    if(empty($login_hash)) {
        header("Location: index.php");
    }

    if (!ctype_xdigit($login_hash)) {
        header("Location: index.php");
    }

    $login_hash = safe_sqlparam($login_hash, $conn);
    $row = retrieve_user_row_from_login_hash($login_hash);
    if($row == null) {
        // Not valid login hash get out of here!
        header("Location: index.php");
    }

    $userid = $row[0];
    null_login_hash($userid);

    $_SESSION['lgh'] = '';
    session_destroy();

    header("Location: index.php");
}

?>