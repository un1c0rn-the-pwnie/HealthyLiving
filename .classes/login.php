<?php

require_once 'validate_functions.php';
require_once 'db.php';
require_once 'funcs.php';
require_once 'captcha.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$login_attempt = false;
$ret_error = "";

if(isset($_POST['submit']) && $captcha_status) {
    $login_attempt = true;
    $username = $_POST['username'];

    if(empty($username)) {
        $ret_error = "Δεν δόθηκε όνομα χρήστη.";
        return;
    }

    $password = $_POST['password'];

    if(empty($password)) {
        $ret_error = "Δεν δόθηκε κωδικός.";
        return;
    }

    if(isset($_POST['remember_me'])) {
        if($_POST['remember_me'] == "remember_me") {
            $remember_me = true;
        } else {
            //hacker alert!!!
            die("What are you trying to do?! Fuzzing is not allowed here!");
        }
    } else {
        $remember_me = false;
    }

    if(!isValidUsername($username)) {
        $ret_error = "Το ονομα χρηστη πρεπει να μην περιεχει ειδικους χαρακτηρες μονο μικρα, κεφαλαια και αριθμοι επιτρεπονται";
        return;
    }

    if(!isValidPassword($password)) {
        $ret_error = "Ο κωδικός πρέπει να περιέχει τουλάχιστον έναν αριθμό, έναν κεφαλαίο χαρακτήρα, έναν μικρό χαρακτήρα, και να είναι 8 οι περισσότερα γράμματα μεγάλος.";
        return;
    }

    // U have succeed to survive from all these checks!

    login($username, $password, $remember_me);
}

function login($username, $password, $remember_me) {
    global $conn, $ret_error;
    $username = safe_sqlparam($username, $conn);
    $password = safe_sqlparam($password, $conn);

    $row = retrieve_user_row($username);

    if($row == null) {
        $ret_error = "Λάθος όνομα χρήστη η κωδικός πρόσβασης παρακαλώ προσπαθήστε ξανά.";
        return;
    }

    $retrieved_password = $row[3];
    $salt               = $row[4];
    $verified           = $row[8];
    
    if($verified == "0"){
        $ret_error = "Δέν έχει επιβεβαιωθεί αυτός ο λογαριασμός , παρακαλώ επιβεβαιώστε τον λογαριασμό";
        return;
    }
    $password = hash('sha512', $salt . $password);

    if(strcmp($password, $retrieved_password) !== 0) {
        $ret_error = "Λάθος όνομα χρήστη η κωδικός πρόσβασης παρακαλώ προσπαθήστε ξανά.";
        return;
    }

    $userid = $row[0];

    initialize_user_session($userid);

    if($remember_me === true) {
        remember_user($userid);
    }

    header("Location: index.php");
}

function login_attempt_status() {
    global $login_attempt, $ret_error;
    if($login_attempt) {
        if(isset($ret_error) && !empty($ret_error)) {
            echo "
            <div>
                $ret_error
            </div> ";
        }
    }
}

?>