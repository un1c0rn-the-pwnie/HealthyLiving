<?php

function safe_sqlparam($param, $conn) {
    $ret = mysqli_real_escape_string($conn, $param);
    $ret = stripslashes($ret);
    return $ret;
}

function isRegisteredUsername($username) {
    global $conn;

    $query = "SELECT username FROM `users` WHERE username = '$username';";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows==0) {
        return false;
    }
    
    return true;
}

function isRegisteredEmail($email) {
    global $conn;

    $query = "SELECT email FROM `users` WHERE email = '$email';";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows==0) {
        return false;
    }
    
    return true;
}


function retrieve_user_row_from_login_hash($login_hash) {
    global $conn;

    $query = "SELECT * FROM `users` WHERE login_hash = '$login_hash';";

    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows == 0) {
        return null;
    }

    $row = $result->fetch_row();

    $result->free_result();

    return $row;
}

function retrieve_user_row($username) {
    global $conn;

    $query = "SELECT * FROM `users` WHERE username = '$username';";

    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows == 0) {
        return null;
    }

    $row = $result->fetch_row();

    $result->free_result();

    return $row;
}

function update_login_hash($userid, $login_hash) {
    global $conn, $ret_error;

    $query = "UPDATE `users` SET login_hash='$login_hash' WHERE id='$userid';";
    $result = mysqli_query($conn,$query);
    if(!$result) {
        $ret_error = 'Προέκυψε κάποιο πρόβλημα κατά την ενημέρωση του login hash!';
        return false;
    }

    return true;
}

function null_login_hash($userid) {
    global $conn, $ret_error;

    $query = "UPDATE `users` SET login_hash=NULL WHERE id='$userid';";
    $result = mysqli_query($conn,$query);
    if(!$result) {
        $ret_error = 'Προέκυψε κάποιο πρόβλημα κατά την ενημέρωση του login hash!';
        return false;
    }

    return true;
}

function initialize_user_session($userid) {
    global $conn;

    $login_hash = hash('sha512', bin2hex(random_bytes('256')));
    if(!update_login_hash($userid, $login_hash)) {
        return;
    }

    $_SESSION['lgh'] = $login_hash;

    header("Location: index.php");
}

?>