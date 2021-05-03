<?php

if(isset($_SESSION['lgh'])) {
    $login_hash = $_SESSION['lgh'];
    if(empty($login_hash)) {
        return;
    }

    if (!ctype_xdigit($login_hash)) {
        return;
    }

    header('Location: index.php');
}

?>