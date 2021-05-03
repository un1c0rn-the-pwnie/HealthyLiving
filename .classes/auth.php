<?php

require_once 'db.php';
require_once 'funcs.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$logged = false;
if(isset($_SESSION['lgh'])) {
    $login_hash = $_SESSION['lgh'];
    if(empty($login_hash)) {
        $conn->close();
        return;
    }

    if (!ctype_xdigit($login_hash)) {
        $conn->close();
        return;
    }

    $login_hash = safe_sqlparam($login_hash, $conn);
    $row = retrieve_user_row_from_login_hash($login_hash);
    if($row == null) {
        // Not valid login hash get out of here!
        $conn->close();
        return;
    }

    $user = $row[1];
    $logged = true;
    $conn->close();
}

?>