<?php

require_once 'db.php';
require_once 'funcs.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$logged = false;
//Ελέγχουμε άμα είναι συνδεδεμένος και το αποθηκεύουμε στο logged, άμα είναι αρχικοποιούμε την μεταβλητη user με το όνομα του.
if(isset($_SESSION['auth'])) {
    if($_SESSION['auth'] !== true) {
        return;
    }

    $uid = $_SESSION['uid'];
    if(empty($uid)) {
        return;
    }

    if (!is_numeric($uid)) {
        return;
    }

    $row = retrieve_user_row_by_id($uid);
    if($row == null) {
        // Not valid uid get out of here!
        return;
    }

    $user = $row[1];
    $logged = true;
} else {
    //γίνεται ο έλεχγος για άμα είναι συνδεδεμένος με ένα cookie απομνημόνευσης του χρήστη
    if(isset($_COOKIE['lgh'])) {
        $login_hash = $_COOKIE['lgh'];
    
        if(empty($login_hash)) {
            return;
        }

        if(!ctype_xdigit($login_hash)) {
            die("τί πάς να κάνεις hacker;");
            return;
        }

        $login_hash = safe_sqlparam($login_hash, $conn);

        $row = retrieve_user_row_from_login_hash($login_hash);
        if($row == null) {
            // invalid login hash
            return;
        }

        $userid = $row[0];
        initialize_user_session($userid);

        $user = $row[1];
        $logged = true;
    }
}


$_SESSION['$logged'] = $logged;

?>