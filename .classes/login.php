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
    $username = $_POST['username'];

    if(empty($username)) {
        die("Empty username");
    }

    $password = $_POST['password'];

    if(empty($password)) {
        die("Empty password");
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
        die("Invalid username");
    }

    if(!isValidPassword($password)) {
        die("Invalid password");
    }

    // U have succeed to survive from all these checks!

    login($username, $password, $remember_me);

    $login_attempt = true;
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
    
    $password = hash('sha512', $salt . $password);

    if(strcmp($password, $retrieved_password) !== 0) {
        $ret_error = "Λάθος όνομα χρήστη η κωδικός πρόσβασης παρακαλώ προσπαθήστε ξανά.";
        return;
    }

    $userid = $row[0];

    initialize_user_session($userid);
}

function login_attempt_status() {
    global $login_attempt, $ret_error, $conn;
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