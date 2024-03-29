<?php

//Στο αρχέιο υπάρχουν πολλά functions που βοηθούν στην καλύτερη διαχείριση των δεδομένων της βάσης

//φιλτράρισμα κακόβουλου κώδικα για την βάση
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

function retrieve_email_row($email) {
    global $conn;

    $query = "SELECT * FROM `users` WHERE email = '$email';";

    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows == 0) {
        return null;
    }

    $row = $result->fetch_row();

    $result->free_result();

    return $row;
}

//Ενημερώνει το login hash δηλαδή το cookie απομνημόνευσης του χρήστη
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
//Αφαιρεί το login hash δηλαδή το cookie απομνημόνευσης του χρήστη
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

function retrieve_user_row_by_id($uid) {
    global $conn;

    $query = "SELECT * FROM `users` WHERE id = '$uid';";

    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);
    if($rows == 0) {
        return null;
    }

    $row = $result->fetch_row();

    $result->free_result();

    return $row;
}

function initialize_user_session($userid) {
    $_SESSION['uid'] = $userid;
    $_SESSION['auth'] = true;
}

//Δημουργία το login hash δηλαδή το cookie απομνημόνευσης του χρήστη
function remember_user($userid) {

    $login_hash = hash('sha512', bin2hex(random_bytes('256')));

    if(!update_login_hash($userid, $login_hash)) {
        return;
    }

    $options = array (
        'expires' => time() + 86400 * 30, // 30 days
        'path' => '/',
        'domain' => 'localhost',
        'secure' => false,     // when https enable it!!!
        'httponly' => true,    // no javascript is allowed to touch this cookie! no XSS
        'samesite' => 'Strict' // No CSRF is allowed here!
        // but i hope your browser is not too old :)
    );
    setcookie('lgh', $login_hash, $options); // 1 year
}

?>