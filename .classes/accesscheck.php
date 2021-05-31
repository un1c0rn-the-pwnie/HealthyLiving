<?php

//Έλεγχος Άν ο χρήστης είναι συνδεδεμένος , άμα δεν είναι κάνε redirect στην αρχική
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