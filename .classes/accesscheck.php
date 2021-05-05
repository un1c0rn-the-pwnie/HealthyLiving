<?php

if(isset($_SESSION['auth'])) {
    $auth = $_SESSION['auth'];
    if(empty($auth)) {
        return;
    }

    if($auth !== true) {
        return;
    }

    header('Location: index.php');
}

?>